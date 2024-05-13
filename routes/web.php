<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudUserController;
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

Route::get('register', [CrudUserController::class, 'registerUser'])->name('user.registerUser');
Route::post('register', [CrudUserController::class, 'postUser'])->name('user.postUser');