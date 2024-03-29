<?php

use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Models\Company;
use App\Models\Competence;
use App\Models\Etude;
use App\Models\Experience;
use App\Models\OutilMaitrise;

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

Route::get('/', function () {
    return view('welcome', [
        
        'profile' => Profile::all()->where('user_id', '=', 1),
        'etudes' => Etude::all()->where('user_id', '=', 1),
        'competences' => Competence::all()->where('user_id', '=', 1),
        'compagnies' => Company::all()->where('user_id', '=', 1),
        'experiences' => Experience::all()->where('user_id', '=', 1),
        'outils' => OutilMaitrise::all()->where('user_id', '=', 1),
        'index_lvl' => 0,
    ]);
});

Route::get('/dashboard', function () {
    return redirect('admin');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('login', function () {
    return redirect('admin/login');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
