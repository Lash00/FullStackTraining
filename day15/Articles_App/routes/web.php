<?php


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
use App\Models\Article;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/dashboard', function () {
    $recentArticles = Article::with('user')->latest()->take(5)->get();
    return view('dashboard', compact('recentArticles'));
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/articles/create', [ArticlesController::class, 'create'])->name('articles.create');
    Route::post('/articles', [ArticlesController::class, 'store'])->name('articles.store');
    Route::get('/articles/{article}/edit', [ArticlesController::class, 'edit'])->name('articles.edit');
    Route::put('/articles/{article}', [ArticlesController::class, 'update'])->name('articles.update');
    Route::delete('/articles/{article}', [ArticlesController::class, 'destroy'])->name('articles.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/articles', [ArticlesController::class, 'index'])->name('articles.index');
Route::get('/articles/{article}', [ArticlesController::class, 'show'])->name('articles.show');

require __DIR__ . '/auth.php';