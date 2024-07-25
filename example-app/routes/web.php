<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    echo "This is home page";
});

//это для создание и проверки middleware
Route::get('/about', function () {
    return view('about');
})->middleware('check');

// this is for Laravel seven format
// Route::get('/contact', 'ContactController@index');

// this is new update for Laravel eight format
Route::get('/contact', [ContactController::class, 'index']);
