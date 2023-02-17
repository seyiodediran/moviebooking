<?php

use App\Models\MovieListings;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RatingsController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\TheatreController;
use App\Http\Controllers\MovieListingsController;
use Symfony\Component\HttpKernel\HttpCache\Store;

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

Route::get('/', [MovieListingsController::class, 'index']);
Route::get('/movie/{id}', [MovieListingsController::class, 'show']);
Route::get('/movies/create', [MovieListingsController::class, 'create'])->middleware('auth');
Route::post('/movies', [MovieListingsController::class, 'store'], [])->middleware('auth');
Route::get('/movies/manage', [MovieListingsController::class, 'manage'])->middleware('auth');


 //show edit form
Route::get('/movie/{id}/edit', [MovieListingsController::class, 'edit'])->middleware('auth');
// update listing
Route::put('/movie/{id}', [MovieListingsController::class, 'update'])->middleware('auth');

Route::delete('/movie/{id}', [MovieListingsController::class, 'destroy'])->middleware('auth');


//show register create form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');
Route::post('/users', [UserController::class, 'store']);

//log user out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

//reviews
Route::get('/reviews', [ReviewController::class, 'create']);
Route::post('/reviews', [ReviewController::class, 'store']);


//theatres
Route::get('/theatres', [TheatreController::class, 'create']);
Route::post('/theatres', [TheatreController::class, 'store']);


//ratings
Route::post('/ratings', [RatingsController::class, 'store']);
