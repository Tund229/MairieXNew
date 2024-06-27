<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Region;
use App\Models\User;
use App\Notifications\NewUserNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Agents";
        $agents = User::where('name', '!=', 'Dénis Coly')
            ->where('phone', '!=', '+221 78 473 76 71')
            ->where('email', '!=', 'deniscoly19@gmail.com')
            ->get();

        return view('admin.agents.index', compact('title', 'agents'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Agents";
        $regions = Region::all();
        return view('admin.agents.create', compact('title', 'regions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $customMessages = [
            'required' => 'Veuillez remplir ce champ.',
        ];
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'role' => 'required',
        ], $customMessages);

        $existingUser = User::where('name', $data['name'])
            ->orWhere('email', $data['email'])
            ->first();

        if ($existingUser) {
            $message = 'Un utilisateur avec ce nom ou cette adresse e-mail existe déjà.';
            $request->session()->flash('error_message', $message);
            return redirect()->route('admin.agents.index');
        }

        $password = Hash::make('MairiSnAgentPassword');
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $password,
            'phone' => $data['phone'],
            'role' => $data['role'],
        ]);

        try {
            $user->notify(new NewUserNotification($user->id));
            $message = 'Nouvel utilisateur enregistré avec succès. Il peut consulter ses mails.';
            $request->session()->flash('success_message', $message);
        } catch (\Exception $e) {
            $message = 'Nouvel utilisateur enregistré, mais une erreur est survenue lors de l\'envoi du mail de notification.';
            $request->session()->flash('error_message', $message);
        }

        return redirect()->route('admin.agents.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = "Agents";
        $regions = Region::all();
        $user = User::find($id);
        return view('admin.agents.show', compact('title', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $customMessages = [
            'required' => 'Veuillez remplir ce champ.',
        ];
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'role' => 'required',
        ], $customMessages);
        $password = Hash::make('MairiSnAgentPassword');
        $user = User::find($id);
        $user_update = $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'role' => $data['role'],
        ]);
        $message = "Les informations de l'utilisateur ont été modifiées avec succès";
        $request->session()->flash('success_message', $message);
        return redirect()->route('admin.agents.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            $message = "Utilisateur/agent supprimé avec succès";
            session()->flash('success_message', $message);
        } else {
            $message = "Une erreur s'est produite!";
            session()->flash('error_message', $message);
        }
        return redirect()->back();
    }

    public function administrator(int $id)
    {
        $user = User::find($id);
        if ($user) {
            if ($user->role === 'agent') {
                $user->update(['role' => 'admin']);
                $message = "Nouvel administrateur nommé avec succès";
                session()->flash('success_message', $message);
            } elseif ($user->role === 'admin') {
                $user->update(['role' => 'agent']);
                $message = "Droit admin revoqué avec succès";
                session()->flash('success_message', $message);
            } else {
                $message = "Une erreur s'est produite!";
                session()->flash('error_message', $message);
            }
        } else {
            $message = "Une erreur s'est produite!";
            session()->flash('error_message', $message);
        }

        return redirect()->back();
    }
}
