<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bd_test_controller;
use Illuminate\Support\Facades\DB;

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

Route::get('/', function () {
    return view('welcome');
});

//user route permissions
Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);
Route::resource('products', ProductController::class);


Route::get('user-view',[bd_test_controller::class,'index'])->name('index');
Route::get('ajax-view',[bd_test_controller::class,'view'])->name('view');
Route::get('/user-all',[bd_test_controller::class,'allData'])->name('all');
Route::post('/user-store',[bd_test_controller::class,'store'])->name('store');
