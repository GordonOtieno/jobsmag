<?php

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

Route::get('/', function () {
    return view('listings',[
        'heading'=> 'Latest Listings',
        'listings' => Listing::all()
    ]);
});

//single listing
Route::get('/listings/{id}', function ($id) {
    return view('listing',[
        'listing' => Listing::find($id)
    ]);
});



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