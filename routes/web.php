<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;


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





// Route::get('/home', function () {
//     return response('<h1>Hello world</h1>', 200)
//     -> header('Content-Type','text/plain')
//     -> header('foo', 'bar');
// });


// Route::get('/posts/{id}', function ($id) {
//     // ddd($id);
//     return response('Post'.$id);
// })-> where('id','[0-9]+');

// Route::get('/search', function (Request $request) {
// //   dd($request);
//   return $request ->name .' '. $request->id;
// });