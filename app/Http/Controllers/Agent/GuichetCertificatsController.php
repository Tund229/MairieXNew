<?php

namespace App\Http\Controllers\Agent;

use App\Models\GuichetDeces;
use Illuminate\Http\Request;
use App\Models\GuichetDivorce;
use App\Models\GuichetNaissance;
use App\Models\GuichetMariage;
use App\Models\GuichetCertificat;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GuichetCertificatsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Guichet Certificats";
        $agent_mairie = Auth::user()->mairie_id;
        $demandeEnCours = $this->countGuichetAgent('en_traitement', $agent_mairie);
        $guichetCertificats = GuichetCertificat::orderBy('state', 'asc')
        ->where('mairie_id', $agent_mairie)
        ->orderBy('created_at', 'desc')
        ->get();
        return view('agent.guichetCertificats.index', compact('title', 'guichetCertificats', 'demandeEnCours'));
    }

    private function countGuichetAgent(String $state, int $mairie_id)
    {

        $guichetNaissanceCount = GuichetNaissance::where('state', $state)->where('mairie_id', $mairie_id)->count();
        $guichetDecesCount = GuichetDeces::where('state', $state)->where('mairie_id', $mairie_id)->count();
        $guichetMariageCount = GuichetMariage::where('state', $state)->where('mairie_id', $mairie_id)->count();
        $guichetCertificatCount = GuichetCertificat::where('state', $state)->where('mairie_id', $mairie_id)->count();
        $guichetDivorceCount = GuichetDivorce::where('state', $state)->where('mairie_id', $mairie_id)->count();
        $total = $guichetNaissanceCount + $guichetDecesCount + $guichetMariageCount + $guichetCertificatCount + $guichetDivorceCount;
        return $total;
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
        $title = "Guichet Certificats";
        $agent_mairie = Auth::user()->mairie_id;
        $demandeEnCours = $this->countGuichetAgent('en_traitement', $agent_mairie);
        $guichetCertificat = GuichetCertificat::where('id', $id)->first();
        return view('agent.guichetCertificats.show', compact('title', 'guichetCertificat', 'demandeEnCours'));
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

    public function valide($id)
    {
        $guichetCertificat = GuichetCertificat::find($id);
        $agent_id = Auth::user()->id;
        if (!$guichetCertificat) {
            $message = "Une erreur s'est produite!";
            session()->flash('error_message', $message);
        }
        $guichetCertificat->update(['state' => 'terminé', 'date_validation_rejet' => now(),'agent_id'=>$agent_id  ]);
        $message = 'La demande a été traitée et validée avec succès. Le code de suivi est ' . $guichetCertificat->code;
        session()->flash('success_message', $message);
        return redirect()->back();
    }


    public function rejete(Request $request,$id)
    {
        $customMessages = [
            'required' => 'Veuillez remplir le motif du rejet.',
        ];

        $data = $request->validate([
            'motif' => 'required',
        ], $customMessages);

        $guichetCertificat = GuichetCertificat::find($id);
        $agent_id = Auth::user()->id;

        if (!$guichetCertificat) {
            $message = "Une erreur s'est produite!";
            session()->flash('error_message', $message);
        }

        $guichetCertificat->update([
            'state' => 'rejeté', 
            'date_validation_rejet' => now(), 
            'agent_id' => $agent_id, 
            'motif' => $data['motif'] 
        ]);

        $message = 'La demande a été rejetée. Le code de suivi est ' . $guichetCertificat->code;
        session()->flash('error_message', $message);

        return redirect()->back();
    }

}
