<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\App;

Route::middleware(['auth'])->group(function () {
    // Admin Dashboard
    Route::get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('admin.dashboard');
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/home', [AuthController::class, 'index'])->name('index');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    
    Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');

    //branches
    Route::get('/branches/index', [BranchController::class, 'index'])->name('branches.index');
    Route::get('/branches/create',[BranchController::class, 'create'])->name('branches.create');
    Route::post('/branches/store', [BranchController::class, 'store'])->name('branches.store');
    Route::get('/branches/edit/{id}',[BranchController::class, 'edit'])->name('branches.edit');
    Route::put('/branches/update/{id}', [BranchController::class, 'update'])->name('branches.update');
    Route::delete('/branches/destroy/{id}', [BranchController::class, 'destroy'])->name('branches.destroy');
    // Users
    Route::get('/user/index', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

