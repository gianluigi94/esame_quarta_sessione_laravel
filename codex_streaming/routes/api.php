<?php

use App\Http\Controllers\v1\accedi_controller;
use App\Http\Controllers\v1\categoria_controller;
use App\Http\Controllers\v1\comune_italiano_controller;
use App\Http\Controllers\v1\contatto_controller;
use App\Http\Controllers\v1\credito_controller;
use App\Http\Controllers\v1\file_controller;
use App\Http\Controllers\v1\film_controller;
use App\Http\Controllers\v1\indirizzo_controller;
use App\Http\Controllers\v1\lingua_controller;
use App\Http\Controllers\v1\nazione_controller;
use App\Http\Controllers\v1\novita_controller;
use App\Http\Controllers\v1\recapito_controller;
use App\Http\Controllers\v1\ruolo_controller;
use App\Http\Controllers\v1\serie_controller;
use App\Http\Controllers\v1\stato_utente_controller;
use App\Http\Controllers\v1\traduzione_controller;
use App\Http\Controllers\v1\transazione_controller;
use Illuminate\Support\Facades\Route;

if (!defined('_VERS')) {
    define('_VERS', 'v1');
}



//tutti
Route::get(_VERS . '/test/{sale}/{hash_password}', [accedi_controller::class, 'test']); // calcolatore password + sale
Route::get(_VERS . '/accedi/{utente}/{hash?}', [accedi_controller::class, 'show']);
Route::post(_VERS . '/registrazione', [contatto_controller::class, 'registrazione']);
Route::get(_VERS . '/lingue', [lingua_controller::class, 'index']);
Route::get(_VERS . '/lingue/{codice}', [lingua_controller::class, 'show']);
Route::get(_VERS . '/contatti_stato', [stato_utente_controller::class, 'index']);
Route::get(_VERS . '/contatti_stato/{stato}', [stato_utente_controller::class, 'show']);
Route::get(_VERS . '/ruoli', [ruolo_controller::class, 'index']);
Route::get(_VERS . '/ruoli/{ruolo}', [ruolo_controller::class, 'show']);
Route::get(_VERS . '/comuni', [comune_italiano_controller::class, 'index']);
Route::get(_VERS . '/comuni/{comune}', [comune_italiano_controller::class, 'show']);
Route::get(_VERS . '/comuni/{sigla_automobilistica}', [comune_italiano_controller::class, 'provincia']);
Route::get(_VERS . '/nazioni', [nazione_controller::class, 'index']);
Route::get(_VERS . '/nazioni/{nazione}', [nazione_controller::class, 'show']);
Route::get(_VERS . '/nazioni/{continente}', [nazione_controller::class, 'continente']);
Route::get(_VERS . '/traduzioni', [traduzione_controller::class, 'show']); //accetta query: (riferimento) (tipo) (sigla)


// utenti
Route::middleware(['autenticazione', 'contatto_ruolo:amministratore,utente'])->group(function () {

    Route::get(_VERS . '/contatti/{contatto}', [contatto_controller::class, 'show']); //gate
    Route::delete(_VERS . '/contatti/{contatto}', [contatto_controller::class, 'destroy']); //gate
    Route::put(_VERS . '/contatti/{contatto}', [contatto_controller::class, 'update']);
    Route::get(_VERS . '/categorie', [categoria_controller::class, 'index']);
    Route::get(_VERS . '/categorie/{categoria}', [categoria_controller::class, 'show']);
    Route::get(_VERS . '/categorie/{categoria}/{tipo}', [categoria_controller::class, 'contenuti']);
    Route::get(_VERS . '/films', [film_controller::class, 'index']); //gate
    Route::get(_VERS . '/films/{film}', [film_controller::class, 'show']); //gate
    Route::get(_VERS . '/serie', [serie_controller::class, 'index']);
    Route::get(_VERS . '/serie/{serie}', [serie_controller::class, 'show']);
    Route::get(_VERS . '/serie/{serie}/stagioni', [serie_controller::class, 'stagioni']);
    Route::get(_VERS . '/serie/{serie}/stagioni/{numero_stagione}', [serie_controller::class, 'stagione_singola']);
    Route::get(_VERS . '/serie/{serie}/stagioni/{numero_stagione}/episodi', [serie_controller::class, 'episodi']);
    Route::get(_VERS . '/serie/{serie}/stagioni/{numero_stagione}/episodi/{numero_episodio}', [serie_controller::class, 'episodio_singolo']);
    Route::get(_VERS . '/novita', [novita_controller::class, 'index']); //accetta query:film/serie/stagioni
    Route::get(_VERS . '/novita/{novita}', [novita_controller::class, 'show']);
    Route::get(_VERS . '/contatti/{contatto}/credito', [credito_controller::class, 'index']); //gate
    Route::get(_VERS . '/contatti/{contatto}/transazioni', [transazione_controller::class, 'index']); //gate
    Route::get(_VERS . '/contatti/{contatto}/transazioni/{transazione}', [transazione_controller::class, 'show']); //gate
    Route::post(_VERS . '/contatti/{contatto}/transazioni', [transazione_controller::class, 'store']); //gate

    Route::apiResource(_VERS . '/contatti/{contatto}/recapiti', recapito_controller::class); //gate
    Route::apiResource(_VERS . '/contatti/{contatto}/indirizzi', indirizzo_controller::class); //gate

});

// admin
Route::middleware(['autenticazione', 'contatto_ruolo:amministratore'])->group(function () {

    Route::get(_VERS . '/contatti', [contatto_controller::class, 'index']);
    Route::post(_VERS . '/films', [film_controller::class, 'store']);
    Route::put(_VERS . '/films/{film}', [film_controller::class, 'update']);
    Route::delete(_VERS . '/films/{film}', [film_controller::class, 'destroy']);
    Route::post(_VERS . '/categorie', [categoria_controller::class, 'store']);
    Route::put(_VERS . '/categorie/{categoria}', [categoria_controller::class, 'update']);
    Route::delete(_VERS . '/categorie/{categoria}', [categoria_controller::class, 'destroy']);
    Route::post(_VERS . '/serie', [serie_controller::class, 'store']);
    Route::put(_VERS . '/serie/{serie}', [serie_controller::class, 'update']);
    Route::delete(_VERS . '/serie/{serie}', [serie_controller::class, 'destroy']);
    Route::post(_VERS . '/serie/{serie}/stagioni', [serie_controller::class, 'nuova_stagione']);
    Route::put(_VERS . '/serie/{serie}/stagioni/{numero_stagione}', [serie_controller::class, 'modifica_stagione']);
    Route::delete(_VERS . '/serie/{serie}/stagioni/{numero_stagione}', [serie_controller::class, 'elimina_stagione']);
    Route::post(_VERS . '/serie/{serie}/stagioni/{numero_stagione}/episodi', [serie_controller::class, 'nuovo_episodio']);
    Route::put(_VERS . '/serie/{serie}/stagioni/{numero_stagione}/episodi/{numero_episodio}', [serie_controller::class, 'modifica_episodio']);
    Route::delete(_VERS . '/serie/{serie}/stagioni/{numero_stagione}/episodi/{numero_episodio}', [serie_controller::class, 'elimina_episodio']);
    Route::apiResource(_VERS . '/file', file_controller::class); //index accetta query


});
