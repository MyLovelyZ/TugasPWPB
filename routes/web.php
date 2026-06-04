<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FrontEndController;

Route::get('/', [FrontEndController::class, 'index']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [CategoryController::class, 'index']);

    Route::get('/dashboard/category/create', [CategoryController::class, 'create']);
    Route::post('/dashboard/category/store', [CategoryController::class, 'store']);
    Route::get('/kategori/{category}/edit', [CategoryController::class, 'edit']);
    Route::put('/kategori/{category}', [CategoryController::class, 'update']);
    Route::delete('/kategori/{category}', [CategoryController::class, 'destroy']);

    Route::get('/event/create', [EventController::class, 'create']);
    Route::post('/event/store', [EventController::class, 'store']);
    Route::get('/events', [EventController::class, 'index']);
    Route::get('/event/{event}/edit', [EventController::class, 'edit']);
    Route::put('/event/{event}', [EventController::class, 'update']);
    Route::delete('/event/{event}', [EventController::class, 'destroy']);
});

Route::get('/event/{id}', [FrontEndController::class, 'show'])->name('event.show');
