<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\OrderController;

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

//User Routes Group
// Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/admin', 'layout.admin.v_home');
// Route::view('/admin/order', 'layout.admin.v_order');
// Route::view('/admin/user/add', 'layout.admin.user.add_user');
// Route::view('/admin/user/edit/{id}', 'layout.admin.user.add_user');

// Route::get('/admin/login', function () {
//     return view('layout.admin.login');
// });

// Route::get('/admin/register', function () {
//     return view('layout.admin.register');
// });

// Route::get('/admin/forgot-password', function () {
//     return view('layout.admin.forgot-password');
// });

// Route::get('/admin/recover-password', function () {
//     return view('layout.admin.recover-password');
// });

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/config-cache', function() {
    \Artisan::call('config:cache');
    echo 'Config cache cleared';
});
Route::get('/updateapp', function()
{
   \Artisan::call('dump-autoload');
   echo 'dump-autoload complete';
});

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::get('/user/edit/{id}', func[UserController::class, 'edit']);
Route::get('/user-profile', function () {
    return view('layout.user.user-profile');
});
Route::get('/catalog/{id}/order', [CatalogController::class, 'form_order']);

Route::post('/user/update/{id}', [UserController::class, 'editProfile']);
Route::post('/order/create', [OrderController::class, 'create_order']);
Route::get('/list-order', [OrderController::class, 'list_order'])->name('list-order');
Route::get('/order/{id}/detail', [OrderController::class, 'detail_order'])->name('detail-order');
Route::post('/order/{id}/upload', [OrderController::class, 'upload_payment']);

//Admin Dashboard Routes Group
Route::group(['middleware' => 'admin'], function (){
    Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/admin/user', [UserController::class, 'index'])->name('user');
    Route::get('/admin/user/edit/{id}', [UserController::class, 'edit']);
    Route::get('/admin/user/delete/{id}', [UserController::class, 'delete']);
    Route::post('/admin/user/update/{id}', [UserController::class, 'update']);

    Route::get('/admin/catalog', [CatalogController::class, 'index'])->name('catalog');
    Route::get('/admin/catalog/add', [CatalogController::class, 'add']);
    Route::post('/admin/catalog/insert', [CatalogController::class, 'insert']);
    Route::get('/admin/catalog/edit/{id}', [CatalogController::class, 'edit']);
    Route::get('/admin/catalog/delete/{id}', [CatalogController::class, 'delete']);
    Route::post('/admin/catalog/update/{id}', [CatalogController::class, 'update']);
});
