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

class GuichetDecesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Guichet Décès";
        $demandeEnCours = $this->countGuichetAgent('en_traitement');
        $guichetDeces = GuichetDeces::orderBy('state', 'asc')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('agent.guichetDeces.index', compact('title', 'guichetDeces', 'demandeEnCours'));
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
        $title = "Guichet Décès";
        $demandeEnCours = $this->countGuichetAgent('en_traitement');

        $guichetDeces = GuichetDeces::findOrFail($id);

        $fichiers = json_decode($guichetDeces->fichiers_joints, true) ?? [];
        return view('agent.guichetDeces.show', compact('title', 'guichetDeces', 'demandeEnCours', 'fichiers'));
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
        $guichetDeces = GuichetDeces::findOrFail($id);
        $agent_id = Auth::id();

        // Validation des fichiers s'ils sont présents
        if ($request->hasFile('fichiers')) {
            $customMessages = [
                'file' => 'Ce champ doit être un fichier.',
                'mimes' => 'Le fichier doit être de type :values.',
                'max' => 'Le fichier ne doit pas dépasser :max kilo-octets.',
            ];

            $request->validate([
                'fichiers.*' => 'file|mimes:jpg,jpeg,png,pdf|max:2048',
            ], $customMessages);

            $filePaths = [];
            foreach ($request->file('fichiers') as $file) {
                $extension = $file->getClientOriginalExtension();
                $nomFichier = 'SN-' . uniqid() . '-' . $guichetDeces->code . '.' . $extension;
                $filePath = $file->storeAs('chemin/vers/stockage', $nomFichier); // Assurez-vous de spécifier le chemin de stockage correct ici

                $filePaths[] = $filePath;
            }

            $guichetDeces->update([
                'fichiers_joints' => json_encode($filePaths),
                'state' => 'terminé',
                'date_validation_rejet' => now(),
                'agent_id' => $agent_id,
            ]);
        } else {
            // Si aucun fichier n'est téléchargé, seulement mettre à jour l'état
            $guichetDeces->update([
                'state' => 'terminé',
                'date_validation_rejet' => now(),
                'agent_id' => $agent_id,
            ]);
        }

        $message = 'La demande a été traitée et validée avec succès. Le code de suivi est ' . $guichetDeces->code;
        return redirect()->back()->with('success_message', $message);
    }

    public function rejete(Request $request, $id)
    {

        $customMessages = [
            'required' => 'Veuillez remplir le motif du rejet.',
        ];

        $data = $request->validate([
            'motif' => 'required',
        ], $customMessages);

        $guichetDeces = GuichetDeces::find($id);
        $agent_id = Auth::user()->id;

        if (!$guichetDeces) {
            $message = "Une erreur s'est produite!";
            session()->flash('error_message', $message);
        }

        $guichetDeces->update([
            'state' => 'rejeté',
            'date_validation_rejet' => now(),
            'agent_id' => $agent_id,
            'motif' => $data['motif'],
        ]);

        $message = 'La demande a été rejetée. Le code de suivi est ' . $guichetDeces->code;
        session()->flash('error_message', $message);

        return redirect()->back();
    }

    private function countGuichetAgent(String $state)
    {
        $guichetNaissanceCount = GuichetNaissance::where('state', $state)->count();
        $guichetDecesCount = GuichetDeces::where('state', $state)->count();
        $guichetMariageCount = GuichetMariage::where('state', $state)->count();
        $guichetCertificatCount = GuichetCertificat::where('state', $state)->count();
        $guichetDivorceCount = GuichetDivorce::where('state', $state)->count();
        $total = $guichetNaissanceCount + $guichetDecesCount + $guichetMariageCount + $guichetCertificatCount + $guichetDivorceCount;
        return $total;
    }
}
