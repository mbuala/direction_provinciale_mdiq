<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\jurii;
use App\Http\Controllers\etat_engagemen;
use App\Http\Controllers\avi;
use App\Http\Controllers\cp;
use App\Http\Controllers\reglemen;
use App\Http\Controllers\decisio;
use App\Http\Controllers\convocatio;
use App\Http\Controllers\pv;
use App\Http\Controllers\login;
use  App\Http\Controllers\utilisateur;
use  App\Http\middleware\CheckAdmin;
use App\Http\Controllers\testController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/getdatta',[testController::class,'home']);
Route::get('/',[jurii::class,'show_off']);

Route::get('/liste_offre',[jurii::class,'show_off']);

Route::get('/ajouter_avis', [avi::class,'afficher_ajouter_avis']);
Route::get('/modifier_avis', function () {
    return view('modifier_avis');
});


Route::get('/modifier_login', function () {
    return view('modifier_login');
});

Route::post('/Changement_mot_de_passe', [login::class,'mdd']);

Route::post('/new_password', [login::class,'md_lg']);

Route::post('/logiin', [login::class,'show']);

Route::get('/liste_decision', [decisio::class,'show']);

Route::get('/supprimer_decision/{id}', [decisio::class,'supprimer_dec']);

Route::get('/ajouter_decision', [decisio::class,'ajouter_afficher']);

Route::post('/ajoute_decision', [decisio::class,'ajouter']);

Route::get('/liste_cps', [cp::class,'afficher']);

Route::get('/imprimer_cps/{id}', [cp::class,'imprimerr']);

Route::get('/imprimer_reglement/{id}', [reglemen::class,'imprimerr']);

Route::get('/liste_reglement', [reglemen::class,'afficher']);
Route::get('/liste_convocation', [convocatio::class,'afficher']);
Route::get('/liste_jury', [jurii::class,'show']);

Route::get('/ajouter_jury', [jurii::class,'afficher_ajouter']);

Route::post('/ajout_jury', [jurii::class,'ajouter']);

Route::post('/modifier_jury/modifierjj/{id}', [jurii::class,'Updated']);

Route::get('/modifier_jury/{id}', [jurii::class,'Update']);
Route::get('/supprimer_jurry/{id}', [jurii::class,'supprimer']);

Route::get('/etat_engagement', function () {
    return view('etat_engagement');
})->middleware('auth');

Route::get('/ajouter_offre', function () {
    return view('ajouter_offre');
});
Route::post('/add_offre', [jurii::class,'ajouter_off']);

Route::get('/modifier_offre/{id}', [jurii::class,'afficher_md']);

Route::post('modifier_offre/modifierff/{id}', [jurii::class,'mdoff']);

Route::get('/supprimer__off/{id}', [jurii::class,'supprimerOff']);

Route::post('/imprimer_etat', [etat_engagemen::class,'imprimer']);

Route::post('/ajouterr_aviss', [avi::class,'ajouter__avis']);

Route::get('/suprimer_aviss/{id}', [avi::class,'supprimer_avis']);

Route::get('/modifier_avis/{id}', [avi::class,'mod_avis']);

Route::post('/modifier_avis/update/{id}', [avi::class,'update_avis']);

Route::get('/modifier_decision/{id}', [decisio::class,'modifier_decision']);

Route::post('modifier_decision/md_dec/{id}', [decisio::class,'mdd_dec']);

Route::get('/imprimer_aviss/{id}', [avi::class,'imprimer_avis']);

Route::get('/imprimer_decision/{id}', [decisio::class,'imprimer_dec']);

Route::get('/imprimer_convocation/{id}', [convocatio::class,'imprimer']);



/* process verbal */

Route::get('/process_verbal', [pv::class,'afficher_offre']);

/* pv 1 */

Route::get('/pvone_one/{id}', [pv::class,'pageone_pv1']);

Route::post('/pvone_two/{id}', [pv::class,'pagetwo_pv1']);

Route::post('/pvone_two_rec/{id}', [pv::class,'pagetwo_pv1_rec']);

Route::get('/pvone_tw/{id}', [pv::class,'pagetw_pv1']);
Route::post('/pvone_three/{id}', [pv::class,'pagethree_pv1']);

Route::post('/pvone_four/{id}', [pv::class,'pagefour_pv1']);

Route::post('/pvone_reser/{id}', [pv::class,'pagefive_pv1']);

Route::post('/pvone_five/{id}', [pv::class,'pagefive2_pv1']);

Route::post('/pvone_six/{id}', [pv::class,'pagesix_pv1']);

Route::get('/process_verball/{id}', [pv::class,'end_of_pv1']);

Route::get('/Imprimer_pv1/{id}', [pv::class,'Imprimerpvone']);

Route::get('/pvone_one_rec/{id}', [pv::class,'pageone_rec']);

/* pv 2 */


Route::get('/pvtwo_one/{id}', [pv::class,'pageone_pv2']);

Route::post('/pvtwo_two/{id}', [pv::class,'pagetwo_pv2']);

Route::post('/pvtwo_three/{id}', [pv::class,'pagethree_pv2']);

Route::get('/Imprimer_pv2/{id}', [pv::class,'Imprimerpvtwo']);

/* pv 3 */

Route::post('/pvthree_three/{id}', [pv::class,'endofpv3']);

Route::get('/pvthree_one/{id}', [pv::class,'pageone_pv3']);

Route::post('/pvthree_two/{id}', [pv::class,'pagetwo_pv3']);

Route::get('/Imprimer_pv3/{id}', [pv::class,'Imprimerpvthree']);

// Delete les pv

Route::get('/supp_pv1/{id}', [pv::class,'supprimer_pvone']);

Route::get('/supp_pv2/{id}', [pv::class,'supprimer_pvtwo']);

Route::get('/supp_pv3/{id}', [pv::class,'supprimer_pvthree']);

/*Route::get('/', function () {
    return view('auth.login');
});*/

Auth::routes();

Route::get('/getConcurrentsByHints/{hint}',[pv::class,'getConcurrentsByHints']);


Route::get('/home', [jurii::class,'show_off'])->name('home');

Route::get('/liste_avis', [avi::class,'afficher_avis']);


Route::get('/ajouter_utilisateur', function () {
    return view('auth.register');
})->middleware('auth');


 Route::middleware([CheckAdmin::class])->group(function(){
 Route::get('/utilisateurs', [utilisateur::class,'show']);


Route::get('/ajouter_user', [utilisateur::class,'insertform']);
Route::post('/ajout_user', [utilisateur::class,'insert']);
Route::get('/delete_user/{id}', [utilisateur::class,'destroy']);
Route::get('/modifier_user/{id}', [utilisateur::class,'showSpecialUser']);
Route::post('/modifie_user/{id}', [utilisateur::class,'EditSpecialUser']);
});
