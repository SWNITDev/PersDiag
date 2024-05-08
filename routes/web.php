<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MicrosoftGraphController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GraphController;
use App\Http\Middleware\Cors;

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
Route::get('/einladung', function () {
    return view('sso');
});
Route::get('/', function () {
    return view('app');
});
Route::get('/info', function () {
    return view('app');
});
Route::get('/mainWorker', function () {
    return view('app');
});
Route::get('/gespraech', function () {
    return view('app');
});
Route::get('/ergebnisse', function () {
    return view('app');
});
Route::get('/ergebnisse_mitarbeiter', function () {
    return view('app');
});
Route::get('/admin', function () {
    return view('app');
});

Route::get('/user/{userId}/manager', [App\Http\Controllers\MicrosoftGraphController::class, 'showManager']);
Route::get('/user/{userId}/directReports', [App\Http\Controllers\MicrosoftGraphController::class, 'showReportees']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route, um die OAuth-Anfrage zu starten
//Route::get('login/azure', [LoginController::class, 'redirectToProvider']);

Route::middleware([Cors::class])->get('login/azure', [LoginController::class, 'redirectToProvider']);
// Route, um die Antwort von Azure AD zu handhaben
Route::get('login/azure/callback', [LoginController::class, 'handleProviderCallback']);
