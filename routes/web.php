<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChirpController;


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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::view('/', 'welcome')->name('welcome');
/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/

Route::middleware('auth')->group(function () {

    Route::view('/dashboard','dashboard')->name('dashboard');
        
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/chirps', [ChirpController::class, 'index'])->name('chirps.index');

    Route::post('/chirps', [ChirpController::class,'store'])->name('chirps.store');
    
    //session()->flash('status', 'Chirp creado con éxito!');  // session flash message

    /*
    Route::get('/chirps', function () {
        return view('chirps.index');
    })->name('chirps.index');
    */

    /*
    Route::post('/chirps', function () {
        
        Chirp::create([
            'message' => request('message'),
            'user_id' => auth()->id(),
        ]);

        //session()->flash('status', 'Chirp creado con éxito!');  // session flash message

        return to_route('chirps.index')->with('status', 'Chirp creado con éxito!');  // session flash message;
        
    });*/
});

require __DIR__.'/auth.php';