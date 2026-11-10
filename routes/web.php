<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

// Главная страница
Route::get('/', [ArticleController::class, 'index'])->name('home');

// Категория
Route::get('/category', function () {
    return view('category');
})->name('category');

// Журналист (Только для админа и журналиста)
Route::middleware(['auth', 'role:journalist'])->group(function () {
    Route::get('/journalist', function () {
        $categories = \App\Models\Category::all();
        return view('journalist', compact('categories'));
    })->name('journalist');
    
    Route::post('/journalist', [ArticleController::class, 'store'])->name('article.store');
});

// Админ (Только для админа)
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Управление пользователями
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::post('/admin/role/{id}', [AdminController::class, 'updateRole'])->name('admin.updateRole');
    
    // Управление статьями (УДАЛЕНИЕ)
    Route::post('/admin/article/{id}', [AdminController::class, 'deleteArticle'])->name('admin.deleteArticle');
});

// Авторизация
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');