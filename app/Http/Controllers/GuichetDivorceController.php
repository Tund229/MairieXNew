<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;
use App\Models\GuichetDivorce;

class GuichetDivorceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regions = Region::all();
        return view('guichets.guichet-divorce', compact('regions'));
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
            'in' => 'La valeur de ce champ n\'est pas valide.',
            'numeric' => 'Ce champ doit contenir uniquement des chiffres.',
            'integer' => 'Ce champ doit contenir uniquement des chiffres.',
            'between' => 'L\'année est incorrecte',
        ];

        $data = $request->validate([
            'region' => 'required',
            'mairie' => 'required',
            'departement'=>'required',
            'numero_acte_divorce' => 'required',
            'annee_divorce' =>'required|integer|between:1000,9999',
            'telephone' => 'required',
            'nombre_copies' => 'required',
            'infos_demande' => 'required',
        ], $customMessages);

        $code = 'SN-' . mt_rand(1000000, 9999999);
        GuichetDivorce::create([
            'region_id' => $data['region'],
            'mairie_id' => $data['mairie'],
            'departement_id'=> $data['departement'],
            'numero_acte_divorce' => $data['numero_acte_divorce'],
            'annee_divorce' => $data['annee_divorce'],
            'telephone' => $data['telephone'],
            'nombre_copies' => $data['nombre_copies'],
            'infos_demande'=>json_encode($data['infos_demande']),
            'nombre_copies' => $data['nombre_copies'],
            'code' => $code,
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
