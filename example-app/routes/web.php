<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
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

//Category Controller
Route::get('/category/all', [CategoryController::class, 'AllCat'])->name('all.category');
//Add Category Controller
Route::post('/category/add', [CategoryController::class, 'AddCat'])->name('store.category');

//for category editing
Route::get('/category/edit/{id}', [CategoryController::class, 'Edit']);
//for category update
Route::post('/category/update/{id}', [CategoryController::class, 'Update']);
//for category deleting
Route::get('/softdelete/category/{id}', [CategoryController::class, 'SoftDelete']);
//for category restoring
Route::get('/category/restore/{id}', [CategoryController::class, 'Restore']);
//for category permanent deleteing
Route::get('/pdelete/category/{id}', [CategoryController::class, 'Pdelete']);

//route for Brand page
Route::get('/brand/all', [BrandController::class, 'AllBrand'])->name('all.brand');
//route for adding & storing Brand
Route::post('/brand/add', [BrandController::class, 'StoreBrand'])->name('store.brand');
//route for editing Brand image
Route::get('/brand/edit/{id}', [BrandController::class, 'Edit']);
//route for updating Brand data
Route::post('/brand/edit/{id}', [BrandController::class, 'Update']);
//route for deleting Brand data
Route::post('/brand/delete/{id}', [BrandController::class, 'Delete']);

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',
])->group(function () {
    Route::get('/dashboard', function () {

        // $users = User::all();
        $users = DB::table('users')->get();

        return view('dashboard', compact('users'));
    })->name('dashboard');
});
