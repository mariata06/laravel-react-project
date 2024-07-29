<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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

//Для демонсстрации создания и проверки middleware
// Route::get('/about', function () {
//     return view('about');
// })->middleware('check');

Route::get('/about', function () {
    return view('about');
});

// this is for Laravel seven format
// Route::get('/contact', 'ContactController@index');

// this is new update for Laravel eight format
// привычный метод создания route
//Route::get('/contact', [ContactController::class, 'index']);

// другой, более проф.метод создания route для длинного имени урла
Route::get('/dkfhdxkfh-fdlfjxkd-ksfndxkjn', [ContactController::class, 'index'])->name('mariata');

Route::middleware(['auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {

        // $users = User::all();
        $users = DB::table('users')->get();

        return view('dashboard', compact('users'));
    })->name('dashboard');
});
