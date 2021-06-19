<?php

use App\Http\Controllers\FestivalController;
use App\Http\Controllers\VisitorController;
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
    $festivals = App\Models\Festival::latest()->paginate(9);
    return view('home', compact("festivals"));
})->name('home');

Route::get("/test", function() {
    return view('test');
});

Route::get("/visitors/{festival}/create", [VisitorController::class, "create"])->name('visitors.create');
Route::get("/festivals/{festival}/show", [FestivalController::class, "show"])->name('festivals.show');
Route::post("/visitors/{festival}", [VisitorController::class, "store"])->name('visitors.store');


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
