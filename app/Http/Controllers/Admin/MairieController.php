<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Mairie;
use App\Models\Region;
use App\Models\Departement;
use App\Models\GuichetDeces;
use Illuminate\Http\Request;
use App\Models\GuichetDivorce;
use App\Models\GuichetMariage;
use App\Models\GuichetNaissance;
use App\Models\GuichetCertificat;

use App\Http\Controllers\Controller;

class MairieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Mairies";
        $title = "Mairies";
        $mairies = Mairie::whereNotNull('name')
            ->whereNotNull('departement_id')
            ->get();

        return view('admin.mairies.index', compact('title', 'mairies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Mairies";
        $regions = Region::all();
        return view('admin.mairies.create', compact('title', 'regions'));
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
            'departement' => 'required'
        ], $customMessages);
        $mairie = Mairie::create([
            'name' => $data['name'],
            'departement_id' => $data['departement']
        ]);
        $message = 'Nouvelle mairie enregistrée avec succès.';
        $request->session()->flash('success_message', $message);
        return redirect()->route('admin.mairies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = "Mairies";
        $mairie = Mairie::find($id);
        $regions = Region::all();
        $departements = Departement::all();
        return view('admin.mairies.show', compact('title', 'mairie', 'departements', 'regions'));
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
            'departement' => 'required'
        ], $customMessages);
        $mairie = Mairie::find($id);
        $mairie_update = $mairie->update([
            'name' => $data['name'],
            'departement_id' => $data['departement']
        ]);
        $message = "Les informations de la mairie ont été modifiées avec succès";
        $request->session()->flash('success_message', $message);
        return redirect()->route('admin.mairies.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mairie = Mairie::find($id);
    
        if (!$mairie) {
            $message = "La suppression de l'élément a échoué";
            session()->flash('error_message', $message);
            return redirect()->back();
        }
        $users = User::where('mairie_id', $mairie->id)->get();
        foreach($users as $user){
            if($user->role == "admin"){
                $user->update(['mairie_id' => null]);
            }elseif($user->role == "agent"){
                $user->delete();
            }
        }
        $this->deleteMairieAssets($mairie->id);
        $mairie->delete();
        $message = "Élément supprimé avec succès";
        session()->flash('success_message', $message);
        return redirect()->back();
    }
    





    private function deleteMairieAssets(int $mairie_id)
    {
        try {
            GuichetNaissance::where('mairie_id', $mairie_id)->delete();
            GuichetDeces::where('mairie_id', $mairie_id)->delete();
            GuichetMariage::where('mairie_id', $mairie_id)->delete();
            GuichetCertificat::where('mairie_id', $mairie_id)->delete();
            GuichetDivorce::where('mairie_id', $mairie_id)->delete();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
