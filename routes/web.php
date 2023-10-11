<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Route vers le tableau de bord (dashboard) avec Inertia
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Routes pour la gestion du profil de l'utilisateur
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::controller(ArticleController::class)->group(function () {
    Route::get('/home', 'index');
    Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create'); // Création d'un nouvel article
    Route::get('/article/{id}', [ArticleController::class, 'show'])->name('article.show'); // Affichage d'un article
    Route::get('/article/{id}/edit', [ArticleController::class, 'edit'])->name('article.edit'); // Édition d'un article

    Route::post('/article', [ArticleController::class, 'store'])->name('article.store'); // Enregistrement d'un nouvel article
    Route::patch('/article/{id}', [ArticleController::class, 'update'])->name('article.update'); // Mise à jour d'un article
    Route::delete('/article/{id}', [ArticleController::class, 'destroy'])->name('article.destroy'); // Suppression d'un article
});

require __DIR__.'/auth.php';

