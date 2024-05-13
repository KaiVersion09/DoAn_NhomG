<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudUserController;
use App\Http\Controllers\CrudStaffController;
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
//staff
Route::get('staff/list', [CrudStaffController::class, 'listStaff'])->name('staff.list');
Route::get('staff/add', [CrudStaffController::class, 'addStaff'])->name('staff.add');
Route::post('staff/add', [CrudStaffController::class, 'postStaff'])->name('staff.post');
