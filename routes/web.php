<?php

use App\Http\Controllers\ListingController;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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
Route::get('/listings/create', [ListingController::class,'create']);

//store route
Route::post('/listings/store', [ListingController::class,'store']);

//edit route
Route::get('/listings/{listing}/edit', [ListingController::class,'edit']);

//Update route
Route::Put('/listings/{listing}', [ListingController::class,'update']);

//Delete route
Route::delete('/listings/{listing}', [ListingController::class,'destroy']);

//single listing Route Model Binding feature
Route::get('/listings/{listing}', [ListingController::class,'show']);



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