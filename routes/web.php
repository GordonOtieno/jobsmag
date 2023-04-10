<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;


//All Listings

Route::get('/', [ListingController::class,'index']);

//create route
Route::get('/listings/create', [ListingController::class,'create'])->middleware('auth');

//store route
Route::post('/listings/store', [ListingController::class,'store']);

//edit route
Route::get('/listings/{listing}/edit', [ListingController::class,'edit'])->middleware('auth');

//Update route
Route::Put('/listings/{listing}', [ListingController::class,'update'])->middleware('auth');

//Delete route
Route::delete('/listings/{listing}', [ListingController::class,'destroy'])->middleware('auth');

//Manage listings
Route::get('/listings/manage', [ListingController::class,'manage'])->middleware('auth');

//single listing Route Model Binding feature
Route::get('/listings/{listing}', [ListingController::class,'show']);

//Delete route
Route::get('/users/register', [UserController::class,'register'])->middleware('guest');

//single listing Route Model Binding feature
Route::post('/users/store', [UserController::class,'store']);

//get login user form
Route::get('/users/login', [UserController::class,'login'])->name('login')->middleware('guest');

//Authenticate user
Route::post('/users/authenticate', [UserController::class,'authenticate']);


//logout user
Route::post('/logout', [UserController::class,'logout'])->middleware('auth');

