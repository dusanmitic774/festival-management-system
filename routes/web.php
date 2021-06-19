<?php

use App\Http\Controllers\FestivalController;
use Illuminate\Support\Facades\Route;

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

Route::get('/festivals', [FestivalController::class, "index"])->name('festivals.index');

Route::group(["middleware" => "auth"], function() {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/festivals/create', [FestivalController::class, "create"])->name("festivals.create");
    Route::get('/festivals/{festival}/edit', [FestivalController::class, "edit"])->name("festivals.edit");
    Route::post('/festivals', [FestivalController::class, "store"])->name("festivals.store");
    Route::put('/festivals/{festival}', [FestivalController::class, "update"])->name("festivals.update");
    Route::delete('/festivals/{festival}', [FestivalController::class, "destroy"])->name("festivals.delete");
});

require __DIR__.'/auth.php';
