<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChangePass;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Models\User;
use Illuminate\Support\Facades\DB;

//route for email verification
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


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
    $brands = DB::table('brands')->get();
    $abouts = DB::table('home_abouts')->first();
    return view('home', compact('brands', 'abouts'));
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

// здесь из пропущенных уроков должны быть рауты для добавления и хранения картинок
// позже вернуться к этому месту
// Multi mage Route for Brand
// Route::get('/multi/image', [BrandController::class, 'Multpic'])->name('multi.image');
// Route::post('/multi/add', [BrandController::class, 'StoreImg'])->name('store.image');

// Admin All Route
// route for just Slider
Route::get('/home/slider', [HomeController::class, 'HomeSlider'])->name('home.slider');
// route for adding slider
Route::get('/add/slider', [HomeController::class, 'AddSlider'])->name('add.slider');
// route for store slider
Route::post('/store/slider', [HomeController::class, 'StoreSlider'])->name('store.slider');

// route for About us
Route::get('/home/about', [AboutController::class, 'HomeAbout'])->name('home.about');
// route for adding About
Route::get('/add/about', [AboutController::class, 'AddAbout'])->name('add.about');
// route for store About
Route::post('/store/about', [AboutController::class, 'StoreAbout'])->name('store.about');
//route for editing About
Route::get('/about/edit/{id}', [AboutController::class, 'EditAbout']);
//route for editing About
Route::post('/update/homeabout/{id}', [AboutController::class, 'UpdateAbout']);
//route for deleting About
Route::get('/about/delete/{id}', [AboutController::class, 'DeleteAbout']);

// Admin Contact Page Route
Route::get('/admin/contact', [ContactController::class, 'AdminContact'])->name('admin.contact');
Route::get('/admin/add/contact', [ContactController::class, 'AdminAddContact'])->name('add.contact');
Route::post('/admin/store/contact', [ContactController::class, 'AdminStoreContact'])->name('store.contact');

// for store messages in admin panel
Route::get('/admin/message', [ContactController::class, 'AdminMessage'])->name('admin.message');

// home Contact Page Route
Route::get('/contact', [ContactController::class, 'Contact'])->name('contact');
Route::post('/contact/form', [ContactController::class, 'ContactForm'])->name('contact.form');


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',
])->group(function () {
    Route::get('/dashboard', function () {

        // $users = User::all();
        // $users = DB::table('users')->get();

        // такой дашборд был в ларавеле по дефолту. меняем его на наш
        // return view('dashboard', compact('users'));

        // новый view для нашей админ панели
        return view('admin.index');

    })->name('dashboard');
});

//route for logout for dashboard page
Route::get('/user/logout', [BrandController::class, 'Logout'])->name('user.logout');


// change password and user Profile Route
Route::get('/user/password', [ChangePass::class, 'CPassword'])->name('change.password');
Route::post('/password/update', [ChangePass::class, 'UpdatePassword'])->name('password.update');


//user profile
Route::get('/user/profile', [ChangePass::class, 'PUpdate'])->name('profile.update');
//user profile update
Route::post('/user/profile/update', [ChangePass::class, 'UpdateProfile'])->name('update.user.profile');
