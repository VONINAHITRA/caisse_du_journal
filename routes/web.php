<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\ParametreController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OperationController;

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

//Authentification route
Route::get('/', [AuthController::class, 'index'])->name("authentification");

Route::name('auth.')->group(function () {
Route::post('/connexion',   [AuthController::class, 'connexion'])->name("connexion");
Route::get('/deconnexion',  [AuthController::class, 'deconnexion'])->name("deconnexion");
});

//Page home route
Route::get('/index', [AccueilController::class, 'index'])->name("index");

//Opération route
Route::name('operations.')->group(function () {
Route::get('/operation/index',  [OperationController::class, 'index'])->name("index");
Route::get('/operation/create', [OperationController::class, 'create'])->name("create");
Route::post('/operation/store', [OperationController::class, 'store'])->name("store");
Route::get('/operation/{idType}/destroy', [OperationController::class, 'destroy'])->name("destroy");
Route::get('/operation/{idType}/edit', [OperationController::class, 'edit'])->name("edit");
Route::post('/operation/{idType}/update', [OperationController::class, 'update'])->name("update");
});

//Dasboard route
Route::name('dashboard.')->group(function () {
Route::get('/dashboard/index',  [DashboardController::class, 'index'])->name("index");
Route::get('/dashboard/create', [DashboardController::class, 'create'])->name("create");
Route::post('/dashboard/store', [DashboardController::class, 'store'])->name("store");
Route::get('/dashboard/{idType}/destroy', [DashboardController::class, 'destroy'])->name("destroy");
Route::get('/dashboard/{idType}/edit', [DashboardController::class, 'edit'])->name("edit");
Route::post('/dashboard/{idType}/update', [DashboardController::class, 'update'])->name("update");
});

//Parametres route
Route::name('params.')->group(function () {
Route::get('/parametre/index',  [ParametreController::class, 'index'])->name("index");
Route::get('/parametre/create', [ParametreController::class, 'create'])->name("create");
Route::post('/parametre/store', [ParametreController::class, 'store'])->name("store");
Route::get('/parametre/{idType}/destroy', [ParametreController::class, 'destroy'])->name("destroy");
Route::get('/parametre/{idType}/edit', [ParametreController::class, 'edit'])->name("edit");
Route::post('/parametre/{idType}/update', [ParametreController::class, 'update'])->name("update");
});