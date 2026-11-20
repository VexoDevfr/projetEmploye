<?php

use App\Http\Controllers\EmployeController;
use App\Http\Controllers\EquipeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/listerEmployes', [ EmployeController::class, 'listEmployes']);

Route::get('/ajouterEmploye',[ EmployeController::class, 'addEmploye']);

Route::post('validerEmploye', [ EmployeController::class, 'validEmploye']);

Route::get('/editerEmploye/{id}',[ EmployeController::class, 'editEmploye']);

Route::get('/listerEquipes', [ EquipeController::class, 'listEquipes']);

Route::get('/ajouterEquipe',[ EquipeController::class, 'addEquipe']);

Route::post('validerEquipe', [ EquipeController::class, 'validEquipe']);

Route::get('/editerEquipe/{id}',[ EquipeController::class, 'editEquipe']);



