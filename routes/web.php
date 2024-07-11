<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MairieController;
use App\Http\Controllers\GuichetDecesController;
use App\Http\Controllers\GuichetDivorceController;
use App\Http\Controllers\GuichetMariageController;
use App\Http\Controllers\GuichetNaissanceController;
use App\Http\Controllers\GuichetCertificatsController;
use App\Http\Controllers\GuichetCertificatController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/', function () {
    return view('welcome');
})->name('welcome');
// mairies
// Route::get('/departements/{regionId}', [HomeController::class, 'getDepartementByRegion']);
// Route::get('/mairies/{departementId}', [HomeController::class, 'getMairieByDepartement']);

Route::post('/suivre-demande', [HomeController::class, 'suivre_demande'])->name('suivi-demande');
Route::get('/suivi-demande', [HomeController::class, 'showSuivi'])->name('showSuivi');
Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
Route::post('/profile/{id}', [HomeController::class, 'profile_update'])->name('profile_update');


//guichet decès
Route::group(['prefix' => 'guichet-deces'], function () {
    Route::get('/', [GuichetDecesController::class, 'index'])->name('guichet-deces.index');
    Route::post('/', [GuichetDecesController::class, 'store'])->name('guichet-deces.store');
});
//guichet naissance
Route::group(['prefix' => 'guichet-naissance'], function () {
    Route::get('/', [GuichetNaissanceController::class, 'index'])->name('guichet-naissance.index');
    Route::post('/', [GuichetNaissanceController::class, 'store'])->name('guichet-naissance.store');
});
//guichet mariage
Route::group(['prefix' => 'guichet-mariage'], function () {
    Route::get('/', [GuichetMariageController::class, 'index'])->name('guichet-mariage.index');
    Route::post('/', [GuichetMariageController::class, 'store'])->name('guichet-mariage.store');
});
//guichet résidence
Route::group(['prefix' => 'guichet-certificats'], function () {
    Route::get('/', [GuichetCertificatsController::class, 'index'])->name('guichet-certificats.index');
    Route::post('/', [GuichetCertificatsController::class, 'store'])->name('guichet-certificats.store');
});
//guichet divorce
Route::group(['prefix' => 'guichet-divorce'], function () {
    Route::get('/', [GuichetDivorceController::class, 'index'])->name('guichet-divorce.index');
    Route::post('/', [GuichetDivorceController::class, 'store'])->name('guichet-divorce.store');
});
//guichet certificat
Route::group(['prefix' => 'guichet-certificat'], function () {
    Route::get('/', [GuichetCertificatController::class, 'index'])->name('guichet-certificat.index');
    Route::post('/', [GuichetCertificatController::class, 'store'])->name('guichet-certificat.store');
});

// Admin
Route::namespace('App\\Http\\Controllers\\Admin')->prefix('admin')->name('admin.')->middleware("is_admin")->group(function () {
    Route::resources([
        'mairies' => "MairieController", // gestion des mairies
        'agents' => "AgentController", // gestion des mairies
    ]);
    //nommer un admin
    Route::get('administrator/{user_id}', 'AgentController@administrator')->name('administrator');
    Route::get('guichet-naissance', 'AdminController@guichet_naissance')->name('guichet_naissance');
    Route::get('guichet-mariage', 'AdminController@guichet_mariage')->name('guichet_mariage');
    Route::get('guichet-divorce', 'AdminController@guichet_divorce')->name('guichet_divorce');
    Route::get('guichet-certificats', 'AdminController@guichet_certificat')->name('guichet_certificat');
    Route::get('guichet-deces', 'AdminController@guichet_deces')->name('guichet_deces');

    Route::get('/delete-all', 'AdminController@deleteAll')->name('delete_all_guichets');
    Route::get('/restore-account', 'AdminController@restore_account')->name('restore_account');
    Route::get('/restore-account-valide/{id}', 'AdminController@restore_account_valide')->name('restore_account_valide');

});

//Agent
Route::namespace('App\\Http\\Controllers\\Agent')->prefix('agent')->name('agent.')->middleware("is_agent")->group(function () {
    Route::resources([
        'guichet-naissance' => "GuichetNaissanceController",
        'guichet-certificats' => "GuichetCertificatsController",
        'guichet-deces' => "GuichetDecesController",
        'guichet-mariage' => "GuichetMariageController",
        'guichet-divorce' => "GuichetDivorceController",
    ]);
    //guichet certificat
    Route::post('guichet-certificats/valide/{id}', 'GuichetCertificatsController@valide')->name('valide');
    Route::post('guichet-certificats/rejete/{id}', 'GuichetCertificatsController@rejete')->name('rejete');

    //guichet naissance
    Route::post('guichet-naissance/valide/{id}', 'GuichetNaissanceController@valide')->name('naissance_valide');
    Route::post('guichet-naissance/rejete/{id}', 'GuichetNaissanceController@rejete')->name('naissance_rejete');

    //guichet décès
    Route::post('guichet-deces/valide/{id}', 'GuichetDecesController@valide')->name('deces_valide');
    Route::post('guichet-deces/rejete/{id}', 'GuichetDecesController@rejete')->name('deces_rejete');


    //guichet mariage
    Route::post('guichet-mariage/valide/{id}', 'GuichetMariageController@valide')->name('mariage_valide');
    Route::post('guichet-mariage/rejete/{id}', 'GuichetMariageController@rejete')->name('mariage_rejete');

    //guichet divorce
    Route::get('guichet-divorce/valide/{id}', 'GuichetDivorceController@valide')->name('divorce_valide');
    Route::get('guichet-divorce/rejete/{id}', 'GuichetDivorceController@rejete')->name('divorce_rejete');


    Route::get('/delete-all/{mairie_id}', 'AgentController@deleteAll')->name('delete_all_guichets');



});
Route::get('/telecharger-fichier/{nom_fichier}', [HomeController::class, 'telechargerFichier'])->name('telecharger_fichier');
Route::get('/restore-account', [HomeController::class, 'restore_account_view'])->name('restore_account_view');
Route::post('/restore-account', [HomeController::class, 'restore_account'])->name('restore_account');

Route::get('/afficher-fichier/{nom_fichier}', function ($nomFichier) {
    $chemin = $nomFichier;
    if (Storage::exists($chemin)) {
        $type = Storage::mimeType($chemin);
        return response()->file(storage_path('app/' . $chemin), ['Content-Type' => $type]);
    } else {
        return response('Fichier non trouvé', 404);
    }
})->name('afficher_fichier');
