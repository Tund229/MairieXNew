<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;
use App\Models\GuichetResidence;
use App\Models\GuichetCertificat;
use App\Http\Controllers\Controller;

class GuichetCertificatsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regions = Region::all();
        return view('guichets.guichet-certificats', compact('regions'));
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
            'file' => 'Ce champ doit être un fichier.',
            'mimes' => 'Ce champ :attribute doit être un fichier de type :values.',
            'numeric' => 'Ce champ doit contenir uniquement des chiffres.',
        ];

        $data = $request->validate([
            'region' => 'required',
            'mairie' => 'required',
            'departement'=> 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'telephone' => 'required',
            'nombre_copies' => 'required|numeric',
            'fichier' => 'required|file|mimes:pdf,jpg,jpeg,png',
            'infos_demande'=> 'required',
            'lieu_naissance'=>'required'
        ], $customMessages);
        $code = 'SN-' . mt_rand(1000000, 9999999);
        $fichier = $request->file('fichier');
        $nomFichier = 'SN-' . $fichier->hashName();
        $chemin = $fichier->storeAs('GuichetCertificats'.'-'.$nomFichier);

        GuichetCertificat::create([
            'region_id' => $data['region'],
            'lieu_naissance' => $data['lieu_naissance'],
            'mairie_id' => $data['mairie'],
            'departement_id'=>$data['departement'],
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'telephone' => $data['telephone'],
            'nombre_copies' => $data['nombre_copies'],
            'fichier' => $chemin,
            'state' => 'en_traitement',
            'code' => $code,
            'infos_demande'=>json_encode($data['infos_demande'])
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
