<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\ResetAgent;
use App\Models\GuichetDeces;
use Illuminate\Http\Request;
use App\Models\GuichetDivorce;
use App\Models\GuichetMariage;
use App\Models\GuichetNaissance;
use App\Models\GuichetCertificat;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Notifications\RestoreAgentNotification;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function guichet_naissance()
    {
        $title = "Tableau de bord";
        $guichetNaissances = GuichetNaissance::all();
        return view('admin.guichets.guichet-naissance', compact('title', 'guichetNaissances'));
    }

    public function guichet_mariage()
    {
        $title = "Tableau de bord";
        $guichetMariages = GuichetMariage::all();
        return view('admin.guichets.guichet-mariage', compact('title', 'guichetMariages'));
    }

    public function guichet_divorce()
    {
        $title = "Tableau de bord";
        $guichetDivorces = GuichetDivorce::all();
        return view('admin.guichets.guichet-divorce', compact('title', 'guichetDivorces'));
    }

    public function guichet_certificat()
    {
        $title = "Tableau de bord";
        $guichetCertificats = GuichetCertificat::all();
        return view('admin.guichets.guichet-certificats', compact('title', 'guichetCertificats'));
    }

    public function guichet_deces()
    {
        $title = "Tableau de bord";
        $guichetDeces = GuichetDeces::all();
        return view('admin.guichets.guichet-deces', compact('title', 'guichetDeces'));
    }



    public function deleteAll()
    {
        try {
            $guichetNaissances = GuichetNaissance::all();
            foreach ($guichetNaissances as $guichetNaissance) {
                $guichetNaissance->delete();
            }

            $guichetDivorces = GuichetDivorce::all();
            foreach ($guichetDivorces as $guichetDivorce) {
                $guichetDivorce->delete();
            }

            $guichetMariages = GuichetMariage::all();
            foreach ($guichetMariages as $guichetMariage) {
                Storage::delete($guichetMariage->fichier);
                $guichetMariage->delete();
            }

            $guichetCertificats = GuichetCertificat::all();
            foreach ($guichetCertificats as $guichetCertificat) {
                Storage::delete($guichetCertificat->fichier);
                $guichetCertificat->delete();
            }

            $guichetDeces = GuichetDeces::all();
            foreach ($guichetDeces as $guichetDece) {
                Storage::delete($guichetDece->fichier);
                $guichetDece->delete();
            }



            $message = "Tous les enregistrements  ont été supprimés avec succès.";
            session()->flash('success_message', $message);
        } catch (\Exception $e) {
            $message = "Une erreur s'est produite : " . $e->getMessage();
            session()->flash('error_message', $message);
        }

        return redirect()->back();
    }


    public function restore_account()
    {
        $restoreAgents = ResetAgent::all();
        $title = "Restauration Agent";
        return view('admin.agents.restore-account', compact('restoreAgents', 'title'));
    }

    public function restore_account_valide($id){
        $title = "Restauration Agent";
        $resetedAgent = ResetAgent::where('id', $id)->first();
        if($resetedAgent){
            $user = User::where('email', $resetedAgent->email)->first();
            $user->update([
                'password'=>Hash::make('MairiSnAgentPassword')
            ]);
            $resetedAgent->delete();
            $user->notify(new RestoreAgentNotification($user->id));
            $message = 'Le mot de passe de'. $user->name .'a été restauré avec succès';
            session()->flash('success_message', $message);
        }
        return redirect()->back();
    }


}
