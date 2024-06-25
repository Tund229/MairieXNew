<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\GuichetDeces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GuichetDecesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regions = Region::all();
        return view('guichets.guichet-deces', compact('regions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $customMessages = [
            'required' => 'Veuillez remplir ce champ.',
            'file' => 'Ce champ  doit être un fichier.',
            'mimes' => 'Ce champ :attribute doit être un fichier de type :values.',
            'in' => 'La valeur de ce champ  n\'est pas valide.',
            'numeric' => 'Ce champ  doit contenir uniquement des chiffres.',
            'mimes' => 'Ce champ doit être un jpg,jpeg ou png ',
            'integer' => 'Ce champ doit être un nombre entier.',
            'between' => 'L\'année est incorrecte',
        
        ];

        $data = $request->validate([
            'region' => 'required',
            'mairie' => 'required',
            'departement' => 'required',
            'prenom_defunt' => 'required',
            'nom_defunt' => 'required',
            'telephone_demandeur' => 'required',
            'numero_acte_deces' => 'required',
            'nombre_copies' => 'required|numeric',
            'annee_deces' => 'required|integer|between:1000,9999',
            'fichier' => 'required|mimes:jpg,jpeg,png,pdf',
            'infos_demande' => 'required',
        ], $customMessages);



        $code = 'SN-' . mt_rand(1000000, 9999999);
        $fichier = $request->file('fichier');
        $nomFichier = 'SN-' . $fichier->hashName();
        $chemin = $fichier->storeAs('GuichetDeces' . '-' . $nomFichier);
        GuichetDeces::create([
            'region_id' => $data['region'],
            'mairie_id' => $data['mairie'],
            'departement_id' => $data['departement'],
            'nom_defunt' => $data['nom_defunt'],
            'prenom_defunt' => $data['prenom_defunt'],
            'nombre_copies' => $data['nombre_copies'],
            'numero_acte_deces' => $data['numero_acte_deces'],
            'annee_deces' => $data['annee_deces'],
            'telephone' => $data['telephone_demandeur'],
            'fichier' => $chemin,
            'state' => 'en_traitement',
            'code' => $code,
            'infos_demande' => json_encode($data['infos_demande'])
        ]);

        $message = 'Votre demande a été enregistrée avec le code de suivi : ' . $code;
        $request->session()->flash('status', $message);
        return redirect()->back()->with('code', $code);
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
}
