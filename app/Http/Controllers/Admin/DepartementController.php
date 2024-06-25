<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Mairie;
use App\Models\Region;
use App\Models\Departement;
use App\Models\GuichetDeces;
use Illuminate\Http\Request;
use App\Models\GuichetDivorce;
use App\Models\GuichetMariage;
use App\Models\GuichetNaissance;
use App\Models\GuichetCertificat;
use App\Http\Controllers\Controller;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Départements";
        $departements = Departement::all();
        return view('admin.departements.index', compact('title', 'departements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Régions";
        $regions = Region::all();
        return view('admin.departements.create', compact('title', 'regions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $customMessages = [
            'required' => 'Veuillez remplir ce champ.',
        ];
        $data = $request->validate([
            'name' => 'required',
            'region' => 'required'
        ], $customMessages);
        $user = Departement::create([
            'name' => $data['name'],
            'region_id' => $data['region']
        ]);
        $message = 'Nouveau département enregistré avec succès.';
        $request->session()->flash('success_message', $message);
        return redirect()->route('admin.departements.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = "Départements";
        $departement = Departement::find($id);
        $regions = Region::all();
        return view('admin.departements.show', compact('title', 'departement', 'regions'));
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
        $customMessages = [
            'required' => 'Veuillez remplir ce champ.',
        ];
        $data = $request->validate([
            'name' => 'required',
            'region' => 'required'
        ], $customMessages);
        $region = Departement::find($id);
        $region_update = $region->update([
            'name' => $data['name'],
            'region_id' => $data['region']
        ]);
        $message = "Les informations du département ont été modifiées avec succès";
        $request->session()->flash('success_message', $message);
        return redirect()->route('admin.departements.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $departement = Departement::find($id);
        if (!$departement) {
            $message = "La suppression de l'élément a échoué";
            session()->flash('error_message', $message);
            return redirect()->back();
        }
        $this->deleteDepartementAssets($departement->id);    
        $departement->delete();      
        $message = "Élément supprimé avec succès";
        session()->flash('success_message', $message);
        return redirect()->back();
    }
    

    private function deleteDepartementAssets(int $departement_id)
    {
        try {
            GuichetNaissance::where('departement_id', $departement_id)->delete();
            GuichetDeces::where('departement_id', $departement_id)->delete();
            GuichetMariage::where('departement_id', $departement_id)->delete();
            GuichetCertificat::where('departement_id', $departement_id)->delete();
            GuichetDivorce::where('departement_id', $departement_id)->delete();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
    
}
