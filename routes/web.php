<?php

use App\Models\Rental;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RentalController;

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



//All rentals
//goes to rental controller using index method-shows all listing
Route::get('/', [RentalController::class, 'index']);

//show create form
Route::get('/rentals/create', [RentalController::class, 'create'])->middleware('auth');

//store rental data
Route::post('/rentals', [RentalController::class, 'store'])->middleware('auth');

//show edit form
Route::get('/rentals/{rental}/edit', [RentalController::class, 'edit'])->middleware('auth');

//to submit our update edit form
Route::put('/rentals/{rental}' , [RentalController::class,'update'])->middleware('auth');

//delete rental
Route::delete('/rentals/{rental}' , [RentalController::class,'destroy'])->middleware('auth');

//manage rental
Route::get('/rentals/manage', [RentalController::class, 'manage'])->middleware('auth');

//Single rental using eloquent model 
//uses show method-show single listing
Route::get('/rentals/{rental}', [RentalController::class, 'show']);

//show register/create form
Route::get('/register' , [UserController::class, 'create'])->middleware('guest');

//create new user
Route::post('/users', [UserController::class, 'store']);

//log user out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//log in user
Route::post('/users/authenticate', [UserController::class,'authenticate']);

