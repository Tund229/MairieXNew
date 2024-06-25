<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Region;
use App\Models\GuichetDeces;
use Illuminate\Http\Request;
use App\Models\GuichetDivorce;
use App\Models\GuichetMariage;
use App\Models\GuichetNaissance;
use App\Models\GuichetCertificat;
use App\Http\Controllers\Controller;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Régions";
        $regions = Region::all();
        return view('admin.regions.index', compact('title', 'regions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Régions";
        return view('admin.regions.create', compact('title'));
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
        ], $customMessages);
        $user = Region::create([
            'name' => $data['name'],
        ]);
        $message = 'Nouvelle région enregistrée avec succès.';
        $request->session()->flash('success_message', $message);
        return redirect()->route('admin.regions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = "Régions";
        $region = Region::find($id);
        return view('admin.regions.show', compact('title', 'region'));
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
        ], $customMessages);
        $region = Region::find($id);
        $region_update =$region->update([
            'name' => $data['name'],
        ]);
        $message = "Les informations de la région ont été modifiées avec succès";
        $request->session()->flash('success_message', $message);
        return redirect()->route('admin.regions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     $region = Region::find($id);
    //     $this->deleteRegionAssets($region->id);
    //     if (!$region) {
    //         $message = "La suppression de l'élément a échouée";
    //         session()->flash('error_message', $message);
    //         return redirect()->back();
    //     }
    //     foreach ($region->departements as $departement) {
    //         foreach ($departement->mairies as $mairie) {
    //             $mairie->delete();
    //         }
    //     }
    //     foreach ($region->departements as $departement) {
    //         $departement->delete();
    //     }
    //     $region->delete();
    //     $message = "Elément supprimé avec succès";
    //     session()->flash('success_message', $message);
    //     return redirect()->back();
    // }


    // private function deleteRegionAssets(int $region_id){
    //     try {
    //         User::where('region_id', $region_id)->delete();
    //         GuichetNaissance::where('region_id', $region_id)->delete();
    //         GuichetDeces::where('region_id', $region_id)->delete();
    //         GuichetMariage::where('region_id', $region_id)->delete();
    //         GuichetCertificat::where('region_id', $region_id)->delete();
    //         GuichetDivorce::where('region_id', $region_id)->delete();
    //         return true;
    //     } catch (\Exception $e) {
    //         return false;
    //     }
    // }
}
