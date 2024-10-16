<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Home route
Route::get('/', function () {
    return view('welcome');
});

// Dashboard route with CustomerController
Route::get('/dashboard', [CustomerController::class, 'loadAllCustomers'])
    ->name('dashboard') // Define the name for the route here
    ->middleware(['auth', 'verified']);


// Show form to create a new customer
Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');

// Store a newly created customer
Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');

// Customer update and delete routes
Route::patch('/customers/{customer}', [CustomerController::class, 'update'])->name('customers.update');
Route::delete('/customers/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Authentication routes
require __DIR__ . '/auth.php';
