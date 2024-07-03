<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\GuichetCertificat;
use App\Models\GuichetDeces;
use App\Models\GuichetDivorce;
use App\Models\GuichetMariage;
use App\Models\GuichetNaissance;
use Illuminate\Http\Request;
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

    public function valide($id, Request $request)
    {
        $guichetCertificat = GuichetCertificat::find($id);
        $agent_id = Auth::user()->id;

        if (!$guichetCertificat) {
            $message = "Une erreur s'est produite!";
            session()->flash('error_message', $message);
            return redirect()->back();
        }

        // Vérifie s'il y a des fichiers téléchargés
        if ($request->hasFile('fichiers')) {
            $filePaths = [];

            // Boucle à travers chaque fichier téléchargé
            foreach ($request->file('fichiers') as $file) {
                // Enregistre le fichier dans le stockage (par exemple, dans le dossier 'public')
                $filePath = $file->store('public');

                // Ajoute le chemin d'accès du fichier à la liste
                $filePaths[] = $filePath;
            }

            // Met à jour le champ 'fichier_joint' avec les chemins d'accès des fichiers en JSON
            $guichetCertificat->update([
                'fichier_joint' => json_encode($filePaths),
                'state' => 'terminé',
                'date_validation_rejet' => now(),
                'agent_id' => $agent_id,
            ]);

            // Message de succès
            $message = 'La demande a été traitée et validée avec succès. Le code de suivi est ' . $guichetCertificat->code;
            session()->flash('success_message', $message);
        } else {
            // Message d'erreur si aucun fichier n'est téléchargé
            $message = "Aucun fichier n'a été téléchargé.";
            session()->flash('error_message', $message);
        }

        return redirect()->back();
    }

    public function rejete(Request $request, $id)
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
            'motif' => $data['motif'],
        ]);

        $message = 'La demande a été rejetée. Le code de suivi est ' . $guichetCertificat->code;
        session()->flash('error_message', $message);

        return redirect()->back();
    }

}
