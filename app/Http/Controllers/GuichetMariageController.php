<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;
use App\Models\GuichetMariage;

class GuichetMariageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regions = Region::all();
        return view('guichets.guichet-mariage', compact('regions'));
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
            'prenom_epoux' => 'required',
            'nom_epoux' => 'required',
            'prenom_epouse' => 'required',
            'nom_epouse' => 'required',
            'telephone' => 'required',
            'nombre_copies' => 'required|numeric',
            'annee_registre' => 'required|integer|between:1000,9999',

            'numero_bulletin' => 'required',
            'infos_demande' => 'required',
            'fichier' => 'required|mimes:jpg,jpeg,png,pdf',
        ], $customMessages);

        $code = 'SN-' . mt_rand(1000000, 9999999);
        $fichier = $request->file('fichier');
        $nomFichier = 'SN-' . $fichier->hashName();
        $chemin = $fichier->storeAs('GuichetMariage' . '-' . $nomFichier);
        GuichetMariage::create([
            'nom_epoux' => $data['nom_epoux'],
            'prenom_epoux' => $data['prenom_epoux'],
            'nom_epouse' => $data['nom_epouse'],
            'prenom_epouse' => $data['prenom_epouse'],
            'telephone' => $data['telephone'],
            'nombre_copies' => $data['nombre_copies'],
            'annee_registre' => $data['annee_registre'],
            'numero_registre_bulletin' => $data['numero_bulletin'],
            'state' => 'en_traitement',
            'code' => $code,
            'infos_demande' => json_encode($data['infos_demande']),
            'fichier' => $chemin,
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
