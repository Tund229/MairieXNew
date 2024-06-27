<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;
use App\Models\GuichetNaissance;

class GuichetNaissanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regions = Region::all();
        return view('guichets.guichet-naissance', compact('regions'));
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
            'between' => 'L\'année est incorrecte',

        ];

        $data = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'lieu_naissance' => 'required',
            'date_naissance' => 'required|date',
            'telephone' => 'required',
            'infos_demande'=>'required',
            'nombre_copies' => 'required|numeric',
            'prenom_pere' => 'required',
            'nom_prenom_mere' => 'required',
            'annee_registre' => 'required|integer|between:1000,9999',
            'numero_acte_naissance' => 'required',
        ], $customMessages);



        $code = 'SN-' . mt_rand(1000000, 9999999);
        GuichetNaissance::create([
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'lieu_naissance' => $data['lieu_naissance'],
            'date_naissance' => $data['date_naissance'],
            'telephone' => $data['telephone'],
            'nombre_copies' => $data['nombre_copies'],
            'prenom_pere' => $data['prenom_pere'],
            'nom_prenom_mere' => $data['nom_prenom_mere'],
            'annee_registre' => $data['annee_registre'],
            'numero_acte_naissance' => $data['numero_acte_naissance'],
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
