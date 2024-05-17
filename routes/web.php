<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CrudFoodController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudUserController;
use App\Http\Controllers\CrudVoucherController;

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

Route::get('dashboard', [CrudUserController::class, 'dashboard']);
Route::get('login', [CrudUserController::class, 'login'])->name('login');
Route::get('home', [CrudUserController::class, 'home'])->name('home');
Route::post('login', [CrudUserController::class, 'authUser'])->name('user.authUser');
Route::get('register', [CrudUserController::class, 'registerUser'])->name('user.registerUser');
Route::post('register', [CrudUserController::class, 'postUser'])->name('user.postUser');
Route::get('list_user', [CrudUserController::class, 'listUser'])->name('user.list');

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin/dashboard', [AdminController::class, 'dashboardAdmin']);
Route::get('delete', [CrudUserController::class, 'deleteUser'])->name('user.deleteUser');
Route::get('update', [CrudUserController::class, 'updateUser'])->name('user.updateUser');
Route::post('update', [CrudUserController::class, 'postUpdateUser'])->name('user.postUpdateUser');


Route::get('admin/food', [CrudFoodController::class, 'food'])->name('food');
Route::get('list_food', [CrudFoodController::class, 'listFood'])->name('food.list');
Route::post('admin/food', [CrudFoodController::class, 'postFood'])->name('food.postFood');
Route::get('admin/updatefood', [CrudFoodController::class, 'updateFood'])->name('food.updateFood');
Route::post('admin/updatefood', [CrudFoodController::class, 'postUpdateFood'])->name('food.postUpdateFood');

Route::get('delete', [CrudFoodController::class, 'deleteFood'])->name('food.deleteFood');

Route::get('list_voucher', [CrudVoucherController::class, 'listVoucher'])->name('voucher.list');
