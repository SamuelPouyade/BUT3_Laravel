<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentaireController;
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

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [ArticleController::class, 'index'])->name('home');
Route::post('/article/{articleId}/comment', [CommentaireController::class, 'store'])->name('comment.store');
Route::get('/articles/{id}/commentaires', [CommentaireController::class, 'index'])->name('comment.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::controller(ArticleController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
    Route::get('/article/{id}', [ArticleController::class, 'show'])->name('article.show');
    Route::get('/article/{id}/edit', [ArticleController::class, 'edit'])->name('article.edit');

    Route::post('/article', [ArticleController::class, 'store'])->name('article.store');
    Route::patch('/article/{id}', [ArticleController::class, 'update'])->name('article.update');
    Route::delete('/article/{id}', [ArticleController::class, 'destroy'])->name('article.destroy');
});

require __DIR__.'/auth.php';

