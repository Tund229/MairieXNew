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

class GuichetDivorceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Guichet Divorce";
        $demandeEnCours = $this->countGuichetAgent('en_traitement');
        $guichetDivorces = GuichetDivorce::orderBy('state', 'asc')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('agent.guichetDivorce.index', compact('title', 'guichetDivorces', 'demandeEnCours'));
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
        $title = "Guichet Divorce";
        $guichetDivorce = GuichetDivorce::findOrFail($id);
        $demandeEnCours = $this->countGuichetAgent('en_traitement');
        $fichiers = json_decode($guichetDivorce->fichiers_joints, true) ?? [];
        return view('agent.guichetDivorce.show', compact('title', 'guichetDivorce', 'demandeEnCours', 'fichiers'));
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
        $guichetDivorce = GuichetDivorce::find($id);
        $agent_id = Auth::id();

        if (!$guichetDivorce) {
            $message = "Une erreur s'est produite!";
            session()->flash('error_message', $message);
            return redirect()->back();
        }

        // Vérification et traitement des fichiers joints s'ils sont téléchargés
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
                $nomFichier = 'SN-' . uniqid() . '-' . $guichetDivorce->code . '.' . $extension;
                $filePath = $file->storeAs( $nomFichier); 

                $filePaths[] = $filePath;
            }

            // Met à jour seulement si des fichiers sont téléchargés
            $guichetDivorce->update([
                'fichiers_joints' => json_encode($filePaths),
                'state' => 'terminé',
                'date_validation_rejet' => now(),
                'agent_id' => $agent_id,
            ]);

            // Message de succès
            $message = 'La demande a été traitée et validée avec succès. Le code de suivi est ' . $guichetDivorce->code;
            session()->flash('success_message', $message);
        } else {
            // Si aucun fichier n'est téléchargé, met à jour seulement les autres champs
            $guichetDivorce->update([
                'state' => 'terminé',
                'date_validation_rejet' => now(),
                'agent_id' => $agent_id,
            ]);

            // Message de succès
            $message = 'La demande a été traitée et validée avec succès. Le code de suivi est ' . $guichetDivorce->code;
            session()->flash('success_message', $message);
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

        $guichetDivorce = GuichetDivorce::find($id);
        $agent_id = Auth::user()->id;
        if (!$guichetDivorce) {
            $message = "Une erreur s'est produite!";
            session()->flash('error_message', $message);
        }

        $guichetDivorce->update([
            'state' => 'rejeté',
            'date_validation_rejet' => now(),
            'agent_id' => $agent_id,
            'motif' => $data['motif'],
        ]);

        $message = 'La demande a été rejetée. Le code de suivi est ' . $guichetDivorce->code;
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
