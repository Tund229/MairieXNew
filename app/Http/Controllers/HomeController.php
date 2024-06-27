<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mairie;
use App\Models\ResetAgent;
use App\Models\Departement;
use App\Models\GuichetDeces;
use Illuminate\Http\Request;
use App\Models\GuichetDivorce;
use App\Models\GuichetMariage;
use App\Models\GuichetNaissance;
use App\Models\GuichetResidence;
use App\Models\GuichetCertificat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['suivre_demande', 'getDepartementByRegion', 'getMairieByDepartement', 'restore_account_view', 'restore_account']);
    }

    public function telechargerFichier($nom_fichier)
    {

        $chemin = $nom_fichier;
        if (Storage::exists($chemin)) {
            $type = Storage::mimeType($chemin);
            return response()->file(storage_path('app/' . $chemin), [
                'Content-Type' => $type,
                'Content-Disposition' => 'attachment; filename="' . basename($chemin) . '"'
            ]);
        } else {
            return response('Fichier non trouvé', 404);
        }
    }




    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $title = "Tableau de bord";
        if ($user->role == "admin") {
            $agent = User::where('state', true)->where('role', 'agent')->count();
            $demandeEnCours = $this->countGuichet('en_traitement');
            $demandeTerminee = $this->countGuichet('terminé');
            $demandeRejetee = $this->countGuichet('rejeté');
            $naissance = GuichetNaissance::all();
            $deces = GuichetDeces::all();
            $certificat = GuichetCertificat::all();
            $mariage = GuichetMariage::all();
            $divorce = GuichetDivorce::all();
            return view('home', compact('title', 'demandeEnCours', 'demandeTerminee', 'demandeRejetee', 'agent', 'naissance', 'deces', 'certificat', 'mariage', 'divorce'));
         }
         elseif($user->role == "agent") {
            $demandeEnCours = $this->countGuichet('en_traitement');
            $demandeTerminee = $this->countGuichet('terminé');
            $demandeRejetee = $this->countGuichet('rejeté');
            $naissance = GuichetNaissance::all();
            $deces = GuichetDeces::all();
            $certificat = GuichetCertificat::all();
            $mariage = GuichetMariage::all();
            $divorce = GuichetDivorce::all();
            return view('home', compact('title', 'demandeEnCours', 'demandeTerminee', 'demandeRejetee', 'naissance', 'deces', 'certificat', 'mariage', 'divorce'));
        }



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

    private function countGuichet(String $state)
    {
        $guichetNaissanceCount = GuichetNaissance::where('state', $state)->count();
        $guichetDecesCount = GuichetDeces::where('state', $state)->count();
        $guichetMariageCount = GuichetMariage::where('state', $state)->count();
        $guichetCertificatCount = GuichetCertificat::where('state', $state)->count();
        $guichetDivorceCount = GuichetDivorce::where('state', $state)->count();
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


    public function suivre_demande(Request $request)
    {
        $customMessages = [
            'required' => 'Veuillez remplir ce champ.',
        ];

        $data = $request->validate([
            'guichet' => 'required',
            'code_suivi' => 'required',
        ], $customMessages);
        $guichetData = null;
        if ($data['guichet'] == "naissance") {
            $codeSuivi = $data['code_suivi'];
            $guichetNaissance = GuichetNaissance::where('code', $codeSuivi)->first();
            if ($guichetNaissance) {
                $guichetData = $guichetNaissance;
            }
        } elseif ($data['guichet'] == "deces") {
            $codeSuivi = $data['code_suivi'];
            $guichetDeces = GuichetDeces::where('code', $codeSuivi)->first();
            if ($guichetDeces) {
                $guichetData = $guichetDeces;
            }
        } elseif ($data['guichet'] == "certificat") {
            $codeSuivi = $data['code_suivi'];
            $guichetCertificat = GuichetCertificat::where('code', $codeSuivi)->first();
            if ($guichetCertificat) {
                $guichetData = $guichetCertificat;
            }
        } elseif ($data['guichet'] == "mariage") {
            $codeSuivi = $data['code_suivi'];
            $guichetMariage = GuichetMariage::where('code', $codeSuivi)->first();
            if ($guichetMariage) {
                $guichetData = $guichetMariage;
            }
        }elseif ($data['guichet'] == "divorce") {
            $codeSuivi = $data['code_suivi'];
            $guichetDivorce = GuichetDivorce::where('code', $codeSuivi)->first();
            if ($guichetDivorce) {
                $guichetData = $guichetDivorce;
            }
        }

        return view('suivi-demande', compact('guichetData'));
    }



    // public function getDepartementByRegion(Request $request, $regionId)
    // {
    //     $departements = Departement::where('region_id', $regionId)->get();
    //     $departementsData = $departements->pluck('name', 'id');
    //     return response()->json($departementsData);
    // }


    // public function getMairieByDepartement(Request $request, $departement_id)
    // {
    //     $mairies = Mairie::where('departement_id', $departement_id)->get();
    //     $mairiesData = $mairies->pluck('name', 'id');
    //     return response()->json($mairiesData);
    // }


    public function restore_account(Request $request)
    {
        $this->validator($request);
        $email = $request["email"];
        $user = User::where('email', '=', $email)->first();
        if (!$user) {
            $message = "Vous n'avez pas encore de compte !Veuillez contacter un administrateur.";
            $request->session()->flash('error_message', $message);
            return redirect()->back();
        } else {
            ResetAgent::updateOrCreate(
                [
                    'email' => $email,
                ],
                [
                    'mairie_id' => $user->mairie_id,
                    'name' => $user->name,
                    'phone' => $user->phone,
                ]
            );
            $message = "Votre demande de restauration de compte sera traitée. Veuillez verifier vos mails!";
            $request->session()->flash('success_message', $message);
            return redirect()->back();
        }
    }

    public function restore_account_view()
    {
        return view('auth.passwords.restore-account');
    }


    private function validator(Request $request)
    {
        return request()->validate([
            'email' => [function ($attribute, $value, $fail) {
                if (empty($value)) {
                    $fail('Veuillez remplir ce champ');
                }
            },'string', 'email', 'max:255'],

        ]);
    }



    public function profile(){
        $title = "Tableau de bord";
        $id = Auth::user()->id;
        $demandeEnCours = $this->countGuichet('en_traitement');
        return view('profile', compact('title', 'demandeEnCours', 'id'));
    }

    public function profile_update(Request $request, $id){
        $customMessages = [
            'required' => 'Veuillez remplir ce champ.',
            'confirmed'=>'Les mots de passe ne correspondent pas',
            'min'=>'Le mot de passe doit avoir au moins 8 caractères'

        ];
        $data = $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed|min:8'
        ], $customMessages);
        $user = User::find($id);
        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->withErrors(['old_password' => 'L\'ancien mot de passe est incorrect']);
        }
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        $message = "Votre mot de passe a été modifié avec success!";
        $request->session()->flash('success_message', $message);
        return redirect()->back();

    }


}
