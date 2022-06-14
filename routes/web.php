<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilisateurConttoller;
use App\Http\Controllers\StageController;
use App\Http\Controllers\StagiaireController;
use App\Http\Controllers\TacheController;
use App\Http\Controllers\NiveauController;
use App\Http\Controllers\EtablissementController;
use App\Http\Controllers\DomaineController;
use App\Http\Controllers\NoteController;




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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login',[UtilisateurConttoller::class,'GOCONNECT'])->name('GOCONNECT');

Route::get('/redirection',[UtilisateurConttoller::class,'Redirection'])->name('Redirection');

Route::post('/login',[UtilisateurConttoller::class,'Authenticate'])->name('Authenticate');
Route::get('/logout',[UtilisateurConttoller::class,'Logout'])->name('Logout');

Route::get('/dashboard',[UtilisateurConttoller::class,'GETDAHSBOARD'])->name('GETDAHSBOARD');
Route::get('header',[UtilisateurConttoller::class,'GETPAGEHEADER'])->name('GETPAGEHEADER');


/******* les routes du  controller utilisateur (stagiare et encadreur) */
Route::get('/add-user',[UtilisateurConttoller::class,'GETPAGEADDUSER'])->name('GETPAGEADDUSER');
Route::get('/list-user',[UtilisateurConttoller::class,'GETALLUSER'])->name('GETALLUSER');
Route::get('/update-user',[UtilisateurConttoller::class,'GETPAGEUPDATEUSER'])->name('GETPAGEUPDATEUSER');

Route::get('/update-information',[UtilisateurConttoller::class,'GETPAGEUPDATEMESINFORMATIONS'])->name('GETPAGEUPDATEMESINFORMATIONS');
Route::post('/update-information',[UtilisateurConttoller::class,'UPDATEMESINFORMATIONS'])->name('UPDATEMESINFORMATIONS');



Route::post('/add-user',[UtilisateurConttoller::class,'ADDUSER'])->name('ADDUSER');
Route::post('update-user/{id}',[UtilisateurConttoller::class,'UPDATEUSER'])->name('UPDATEUSER');
Route::post('delete-user/{id}',[UtilisateurConttoller::class,'DELETEUSER'])->name('DELETEUSER');


/******************** les routes du controller domaine */
Route::get('/add-domaine',[DomaineController::class,'GETPAGEADDOMAINE'])->name('GETPAGEADDOMAINE');
Route::get('/list-domaine',[DomaineController::class,'GETLISTEDOMAINE'])->name('GETLISTEDOMAINE');
Route::get('/update-domaine',[DomaineController::class,'GETPAGEUPDATEDOMAINE'])->name('GETPAGEUPDATEDOMAINE');


Route::post('/add-domaine',[DomaineController::class,'ADDDOMAINE'])->name('ADDDOMAINE');
Route::post('/update-domaine/{id}',[DomaineController::class,'UPDATEDOMAINE'])->name('UPDATEDOMAINE');

Route::post('delete-domaine/{id}',[DomaineController::class,'DELETETEDOMAINE'])->name('DELETETEDOMAINE');




/************ les routes du controlleur Stagiare */
Route::get('/list-stagiare',[StagiaireController::class,'GETLISTESTAGIARE'])->name('GETLISTESTAGIARE');








/******* les routes du  controller stage */

Route::get('/ajout-stage',[StageController::class,'GETPAGEADDSTAGE'])->name('GETPAGEADDSTAGE');
Route::post('ajouts',[StageController::class,'ADDSTAGE'])->name('ADDSTAGE');
Route::get('/liste-stage',[StageController::class,'GETLISTESTAGE'])->name('GETLISTESTAGE');
Route::get('update-stage/',[StageController::class,'GETPAGEUPDATESTAGE'])->name('GETPAGEUPDATESTAGE');
Route::get('listestagiairebyid/',[StageController::class,'GETLISTESTAGIAIREBYID'])->name('GETLISTESTAGIAIREBYID');


Route::post('update-stages/{id}',[StageController::class,'UPDATESTAGE'])->name('UPDATESTAGE');
Route::post('delete-stage/{id}',[StageController::class,'DELETESTAGE'])->name('DELETESTAGE');




/********** les routes du controller stagiaire */
Route::get('/ajout-stagiaire',[StagiaireController::class,'GETPAGEADDSTAGIAIRE'])->name('GETPAGEADDSTAGIAIRE');

/*************les routes du controller tache */
Route::get('/ajout-tache',[TacheController::class,'GETPAGEADDTACHE'])->name('GETPAGEADDTACHE');
Route::post('/ajout-taches',[TacheController::class,'ADDTACHE'])->name('ADDTACHE');
Route::get('/liste-tache',[TacheController::class,'GETLISTETACHE'])->name('GETLISTETACHE');
Route::get('/update-tache',[TacheController::class,'GETPAGEUPDATETACHE'])->name('GETPAGEUPDATETACHE');



Route::get('/liste-mes-tache',[TacheController::class,'GETLISTEDTAGEBYID'])->name('GETLISTEDTAGEBYID');

Route::post('updates-taches/{id}',[TacheController::class,'UPDATETACHE'])->name('UPDATETACHE');
Route::post('delete-taches/{id}',[TacheController::class,'DELETETACHE'])->name('DELETETACHE');

//*** les routes du controller niveau */
Route::get('/ajout-niveau',[NiveauController::class,'GETPAGEADDNIVEAU'])->name('GETPAGEADDNIVEAU');
Route::post('/ajout-niveaux',[NiveauController::class,'ADDNIVEAU'])->name('ADDNIVEAU');
Route::get('/liste-niveau',[NiveauController::class,'GETLISTENIVEAU'])->name('GETLISTENIVEAU');
Route::get('/update-niveau',[NiveauController::class,'GETPAGEUPDATENIVEAU'])->name('GETPAGEUPDATENIVEAU');
Route::post('updates-niveaux/{id}',[NiveauController::class,'UPDATENIVEAU'])->name('UPDATENIVEAU');
Route::post('delete-niveaux/{id}',[NiveauController::class,'DELETENIVEAU'])->name('DELETENIVEAU');

//**** les routes du controller etablissement  */
Route::get('/ajout-etablissement',[EtablissementController::class,'GETPAGEADDETABLISSEMENT'])->name('GETPAGEADDETABLISSEMENT');
Route::post('/ajout-etablissements',[EtablissementController::class,'ADDETABLISSEMENT'])->name('ADDETABLISSEMENT');
Route::get('/liste-etablissement',[EtablissementController::class,'GETLISTEETABLISSEMENT'])->name('GETLISTEETABLISSEMENT');
Route::get('/update-etablissement',[EtablissementController::class,'GETPAGEUPDATEETABLISSEMENT'])->name('GETPAGEUPDATEETABLISSEMENT');
Route::post('updates-etablissements/{id}',[EtablissementController::class,'UPDATEETABLISSEMENT'])->name('UPDATEETABLISSEMENT');
Route::post('delete-etablissements/{id}',[EtablissementController::class,'DELETEETABLISSEMENT'])->name('DELETEETABLISSEMENT');

/******************** les routes du controller notes  */
Route::get('/ajout-note',[NoteController::class,'GETPAGEADDNOTES'])->name('GETPAGEADDNOTES');
Route::get('voir-note-tache',[NoteController::class,'GETPAGEVOIRNOTE'])->name('GETPAGEVOIRNOTE');
Route::get('note',[NoteController::class,'GETPAGESEENOTEBYTACHEID'])->name('GETPAGESEENOTEBYTACHEID');


Route::get('imprimer',[NoteController::class,'GETPAGEIMPRIMERCARTE'])->name('GETPAGEIMPRIMERCARTE');


Route::post('ajout-note/{idtache}/{idstagiaire}',[NoteController::class,'ADDNOTE'])->name('ADDNOTE');



