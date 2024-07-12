<?php

namespace App\Http\Controllers;

use App\Models\GuichetCertificat;
use App\Models\GuichetDeces;
use App\Models\GuichetDivorce;
use App\Models\GuichetMariage;
use App\Models\GuichetNaissance;
use App\Models\ResetAgent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;

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
                'Content-Disposition' => 'attachment; filename="' . basename($chemin) . '"',
            ]);
        } else {
            return response('Fichier non trouvé', 404);
        }
    }

    public function index()
    {
        $user = Auth::user();
        $title = "Tableau de bord";

        if ($user->role == "agent") {
            // Exemple de récupération des données pour les graphiques
            $startDate = Carbon::now()->startOfDay();
            $endDate = Carbon::now()->endOfDay();

            // Graphique par jour
            $dailyData = $this->getDailyData($startDate, $endDate);

            // Graphique par mois
            $monthlyData = $this->getMonthlyData();

            // Graphique par année
            $yearlyData = $this->getYearlyData();

            $demandeEnCours = $this->countGuichet('en_traitement');
            $demandeTerminee = $this->countGuichet('terminé');
            $demandeRejetee = $this->countGuichet('rejeté');
            $naissance = GuichetNaissance::all();
            $deces = GuichetDeces::all();
            $certificat = GuichetCertificat::all();
            $mariage = GuichetMariage::all();
            $divorce = GuichetDivorce::all();

            return view('home', compact('title', 'demandeEnCours', 'demandeTerminee', 'demandeRejetee', 'naissance', 'deces', 'certificat', 'mariage', 'divorce', 'dailyData', 'monthlyData', 'yearlyData'));
        } elseif ($user->role == "admin") {
            $agent = User::where('state', true)->where('role', 'agent')->count();

            // Exemple de récupération des données pour les graphiques
            $startDate = Carbon::now()->startOfDay();
            $endDate = Carbon::now()->endOfDay();

            // Graphique par jour
            $dailyData = $this->getDailyData($startDate, $endDate);

            // Graphique par mois
            $monthlyData = $this->getMonthlyData();

            // Graphique par année
            $yearlyData = $this->getYearlyData();

            $demandeEnCours = $this->countGuichet('en_traitement');
            $demandeTerminee = $this->countGuichet('terminé');
            $demandeRejetee = $this->countGuichet('rejeté');
            $naissance = GuichetNaissance::all();
            $deces = GuichetDeces::all();
            $certificat = GuichetCertificat::all();
            $mariage = GuichetMariage::all();
            $divorce = GuichetDivorce::all();

            return view('home', compact('title', 'agent', 'demandeEnCours', 'demandeTerminee', 'demandeRejetee', 'naissance', 'deces', 'certificat', 'mariage', 'divorce', 'dailyData', 'monthlyData', 'yearlyData'));
        }

        return redirect('/'); // Redirection par défaut si aucune condition n'est remplie
    }

    /**
     * Fonction pour récupérer les données quotidiennes pour le graphique.
     *
     * @param \Carbon\Carbon $startDate
     * @param \Carbon\Carbon $endDate
     * @return array
     */
    private function getDailyData($startDate, $endDate)
    {
        // Exemple de récupération des données pour chaque guichet par jour
        $guichetNaissanceData = GuichetNaissance::whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw('DATE(created_at) as date, count(*) as count')
            ->groupBy('date')
            ->get();

        $guichetDecesData = GuichetDeces::whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw('DATE(created_at) as date, count(*) as count')
            ->groupBy('date')
            ->get();

        $guichetCertificatData = GuichetCertificat::whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw('DATE(created_at) as date, count(*) as count')
            ->groupBy('date')
            ->get();

        $guichetMariageData = GuichetMariage::whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw('DATE(created_at) as date, count(*) as count')
            ->groupBy('date')
            ->get();

        $guichetDivorceData = GuichetDivorce::whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw('DATE(created_at) as date, count(*) as count')
            ->groupBy('date')
            ->get();

        // Formater les données pour le graphique
        $labels = [];
        $naissanceCounts = [];
        $decesCounts = [];
        $certificatCounts = [];
        $mariageCounts = [];
        $divorceCounts = [];

        foreach ($guichetNaissanceData as $data) {
            $labels[] = Carbon::parse($data->date)->format('d M');
            $naissanceCounts[] = $data->count;
        }

        foreach ($guichetDecesData as $data) {
            $decesCounts[] = $data->count;
        }

        foreach ($guichetCertificatData as $data) {
            $certificatCounts[] = $data->count;
        }

        foreach ($guichetMariageData as $data) {
            $mariageCounts[] = $data->count;
        }

        foreach ($guichetDivorceData as $data) {
            $divorceCounts[] = $data->count;
        }

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Naissance',
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'data' => $naissanceCounts,
                ],
                [
                    'label' => 'Décès',
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'data' => $decesCounts,
                ],
                [
                    'label' => 'Certificats',
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'data' => $certificatCounts,
                ],
                [
                    'label' => 'Mariage',
                    'backgroundColor' => 'rgba(255, 206, 86, 0.2)',
                    'borderColor' => 'rgba(255, 206, 86, 1)',
                    'data' => $mariageCounts,
                ],
                [
                    'label' => 'Divorce',
                    'backgroundColor' => 'rgba(153, 102, 255, 0.2)',
                    'borderColor' => 'rgba(153, 102, 255, 1)',
                    'data' => $divorceCounts,
                ],
            ],
        ];
    }

    /**
     * Fonction pour récupérer les données mensuelles pour le graphique.
     *
     * @return array
     */
    private function getMonthlyData()
    {
        // Exemple de récupération des données pour chaque guichet par mois
        $guichetNaissanceData = GuichetNaissance::selectRaw('MONTH(created_at) as month, count(*) as count')
            ->groupBy('month')
            ->get();

        $guichetDecesData = GuichetDeces::selectRaw('MONTH(created_at) as month, count(*) as count')
            ->groupBy('month')
            ->get();

        $guichetCertificatData = GuichetCertificat::selectRaw('MONTH(created_at) as month, count(*) as count')
            ->groupBy('month')
            ->get();

        $guichetMariageData = GuichetMariage::selectRaw('MONTH(created_at) as month, count(*) as count')
            ->groupBy('month')
            ->get();

        $guichetDivorceData = GuichetDivorce::selectRaw('MONTH(created_at) as month, count(*) as count')
            ->groupBy('month')
            ->get();

        // Formater les données pour le graphique
        $labels = [];
        $naissanceCounts = [];
        $decesCounts = [];
        $certificatCounts = [];
        $mariageCounts = [];
        $divorceCounts = [];

        foreach ($guichetNaissanceData as $data) {
            $labels[] = Carbon::create(null, $data->month)->monthName;
            $naissanceCounts[] = $data->count;
        }

        foreach ($guichetDecesData as $data) {
            $decesCounts[] = $data->count;
        }

        foreach ($guichetCertificatData as $data) {
            $certificatCounts[] = $data->count;
        }

        foreach ($guichetMariageData as $data) {
            $mariageCounts[] = $data->count;
        }

        foreach ($guichetDivorceData as $data) {
            $divorceCounts[] = $data->count;
        }

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Naissance',
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'data' => $naissanceCounts,
                ],
                [
                    'label' => 'Décès',
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'data' => $decesCounts,
                ],
                [
                    'label' => 'Certificats',
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'data' => $certificatCounts,
                ],
                [
                    'label' => 'Mariage',
                    'backgroundColor' => 'rgba(255, 206, 86, 0.2)',
                    'borderColor' => 'rgba(255, 206, 86, 1)',
                    'data' => $mariageCounts,
                ],
                [
                    'label' => 'Divorce',
                    'backgroundColor' => 'rgba(153, 102, 255, 0.2)',
                    'borderColor' => 'rgba(153, 102, 255, 1)',
                    'data' => $divorceCounts,
                ],
            ],
        ];
    }

    /**
     * Fonction pour récupérer les données annuelles pour le graphique.
     *
     * @return array
     */
    private function getYearlyData()
    {
        // Exemple de récupération des données pour chaque guichet par année
        $guichetNaissanceData = GuichetNaissance::selectRaw('YEAR(created_at) as year, count(*) as count')
            ->groupBy('year')
            ->get();

        $guichetDecesData = GuichetDeces::selectRaw('YEAR(created_at) as year, count(*) as count')
            ->groupBy('year')
            ->get();

        $guichetCertificatData = GuichetCertificat::selectRaw('YEAR(created_at) as year, count(*) as count')
            ->groupBy('year')
            ->get();

        $guichetMariageData = GuichetMariage::selectRaw('YEAR(created_at) as year, count(*) as count')
            ->groupBy('year')
            ->get();

        $guichetDivorceData = GuichetDivorce::selectRaw('YEAR(created_at) as year, count(*) as count')
            ->groupBy('year')
            ->get();

        // Formater les données pour le graphique
        $labels = [];
        $naissanceCounts = [];
        $decesCounts = [];
        $certificatCounts = [];
        $mariageCounts = [];
        $divorceCounts = [];

        foreach ($guichetNaissanceData as $data) {
            $labels[] = $data->year;
            $naissanceCounts[] = $data->count;
        }

        foreach ($guichetDecesData as $data) {
            $decesCounts[] = $data->count;
        }

        foreach ($guichetCertificatData as $data) {
            $certificatCounts[] = $data->count;
        }

        foreach ($guichetMariageData as $data) {
            $mariageCounts[] = $data->count;
        }

        foreach ($guichetDivorceData as $data) {
            $divorceCounts[] = $data->count;
        }

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Naissance',
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'data' => $naissanceCounts,
                ],
                [
                    'label' => 'Décès',
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'data' => $decesCounts,
                ],
                [
                    'label' => 'Certificats',
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'data' => $certificatCounts,
                ],
                [
                    'label' => 'Mariage',
                    'backgroundColor' => 'rgba(255, 206, 86, 0.2)',
                    'borderColor' => 'rgba(255, 206, 86, 1)',
                    'data' => $mariageCounts,
                ],
                [
                    'label' => 'Divorce',
                    'backgroundColor' => 'rgba(153, 102, 255, 0.2)',
                    'borderColor' => 'rgba(153, 102, 255, 1)',
                    'data' => $divorceCounts,
                ],
            ],
        ];
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
        } elseif ($data['guichet'] == "divorce") {
            $codeSuivi = $data['code_suivi'];
            $guichetDivorce = GuichetDivorce::where('code', $codeSuivi)->first();
            if ($guichetDivorce) {
                $guichetData = $guichetDivorce;
            }
        }

        return view('suivi-demande', compact('guichetData'));
    }

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
            }, 'string', 'email', 'max:255'],

        ]);
    }

    public function profile()
    {
        $title = "Tableau de bord";
        $id = Auth::user()->id;
        $demandeEnCours = $this->countGuichet('en_traitement');
        return view('profile', compact('title', 'demandeEnCours', 'id'));
    }

    public function profile_update(Request $request, $id)
    {
        $customMessages = [
            'required' => 'Veuillez remplir ce champ.',
            'confirmed' => 'Les mots de passe ne correspondent pas',
            'min' => 'Le mot de passe doit avoir au moins 8 caractères',

        ];
        $data = $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed|min:8',
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
