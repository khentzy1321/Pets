<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\PetController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PetCategoryController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/users', [UserController::class, 'index'])->name('users');

    Route::resource('pets', PetController::class)->names([
        'index' => 'pets'
    ]);

    Route::get('/petcategories', [PetCategoryController::class, 'index'])->name('petcategories.index');
    Route::get('/petcategories/create', [PetCategoryController::class, 'create'])->name('petcategories.create');
    Route::post('/petcategories/store', [PetCategoryController::class, 'store'])->name('petcategories.store');
    Route::get('/petcategories/show/{id}', [PetCategoryController::class, 'show'])->name('petcategories.show');
    Route::get('/petcategories/edit/{id}', [PetCategoryController::class, 'edit'])->name('petcategories.edit');
    Route::put('/petcategories/update/{id}', [PetCategoryController::class, 'update'])->name('petcategories.update');
    Route::delete('/petcategories/destroy/{id}', [PetCategoryController::class, 'destroy'])->name('petcategories.destroy');

    Route::get('/pets', [PetController::class, 'index'])->name('pets.index');
    Route::get('/pets/create', [PetController::class, 'create'])->name('pets.create');
    Route::post('/pets/store', [PetController::class, 'store']);
    Route::get('/pets/edit/{id}', [PetController::class, 'edit']);
    Route::put('/pets/update/{id}', [PetController::class, 'update']);
    Route::post('/pets/delete/{id}', [PetController::class, 'destroy']);
});
