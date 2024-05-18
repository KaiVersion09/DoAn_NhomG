<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudUserController;
use App\Http\Controllers\CrudNewsController;
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
Route::get('list_news', [CrudNewsController::class, 'listNews'])->name('listNews');
Route::get('add_news', [CrudNewsController::class, 'addNews'])->name('add_news');
Route::post('add_news', [CrudNewsController::class, 'add_News'])->name('addNews');
Route::post('update_news', [CrudNewsController::class, 'postUpdateNews'])->name('updateNews');
Route::get('update_news', [CrudNewsController::class, 'updateNews'])->name('update_news');
Route::get('delete_news', [CrudNewsController::class, 'deleteNews'])->name('delete_news');
Route::get('/user/find', [CrudUserController::class, 'findUser'])->name('user.find');
