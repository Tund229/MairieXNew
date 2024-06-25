<?php

namespace App\Http\Controllers\Agent;

use App\Models\GuichetDeces;
use Illuminate\Http\Request;
use App\Models\GuichetDivorce;
use App\Models\GuichetMariage;
use App\Models\GuichetNaissance;
use App\Models\GuichetCertificat;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AgentController extends Controller
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


    public function deleteAll($mairie_id)
    {
        
        try {
            $guichetNaissances = GuichetNaissance::where('mairie_id', $mairie_id)->get();
            foreach ($guichetNaissances as $guichetNaissance) {
                $guichetNaissance->delete();
            }

            $guichetDivorces = GuichetDivorce::where('mairie_id', $mairie_id)->get();
            foreach ($guichetDivorces as $guichetDivorce) {
                $guichetDivorce->delete();
            }

            $guichetMariages = GuichetMariage::where('mairie_id', $mairie_id)->get();
            foreach ($guichetMariages as $guichetMariage) {
                Storage::delete($guichetMariage->fichier);
                $guichetMariage->delete();
            }

            $guichetCertificats = GuichetCertificat::where('mairie_id', $mairie_id)->get();
            foreach ($guichetCertificats as $guichetCertificat) {
                Storage::delete($guichetCertificat->fichier);
                $guichetCertificat->delete();
            }

            $guichetDeces = GuichetDeces::where('mairie_id', $mairie_id)->get();
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
}
