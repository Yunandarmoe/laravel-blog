<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;

// Home
Route::get('/', function () {
    return view('home');
})->name('home');

// Auth Middleware
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])->name('posts.likes');
    Route::delete('/posts/{post}/likes', [PostLikeController::class, 'destroy'])->name('posts.likes');
    // Post  
    Route::post('/posts', [PostController::class, 'store']);
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});

// Guest Middleware
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
});

// Logout
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

// User Post
Route::get('/user/{user:name}/posts', [UserPostController::class, 'index'])->name('users.posts');

// Post  
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

// Forgot Password
Route::get('/forgetpassword', [ForgotPasswordController::class, 'index'])->name('forgotpassword.index');
Route::post('/forgetpassword', [ForgotPasswordController::class, 'store'])->name('forgotpassword.store');
Route::get('/resetpassword/{token}', [ForgotPasswordController::class, 'show'])->name('resetpassword.show');
Route::post('/resetpassword', [ForgotPasswordController::class, 'update'])->name('resetpassword.update');

// Localization
Route::middleware('lang')->group(function() {
    Route::get('lang/{lang}', [LocalizationController::class, 'index']);
});

Route::middleware('lang')->group(function() {
    Route::get('about', [PageController::class, 'about']);
    Route::get('lang/{lang}', [LocalizationController::class, 'index']);
});
