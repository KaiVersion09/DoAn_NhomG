<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CrudBranchesController;
use App\Http\Controllers\CrudFoodController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudUserController;

use App\Http\Controllers\CrudStaffController;
use App\Http\Controllers\CrudDinnerTableController;
use App\Http\Controllers\CrudNewsController;
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
Route::get('signout', [CrudUserController::class, 'signOut'])->name('signout');
Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin/dashboard', [AdminController::class, 'dashboardAdmin']);
Route::get('user/delete', [CrudUserController::class,'deleteUser'])->name('user.deleteUser');
Route::get('update', [CrudUserController::class, 'updateUser'])->name('user.updateUser');
Route::post('update', [CrudUserController::class, 'postUpdateUser'])->name('user.postUpdateUser');

Route::get('admin/food', [CrudFoodController::class, 'food'])->name('food');
Route::get('list_food', [CrudFoodController::class, 'listFood'])->name('food.list');
Route::post('admin/food', [CrudFoodController::class, 'postFood'])->name('food.postFood');
Route::get('admin/updatefood', [CrudFoodController::class, 'updateFood'])->name('food.updateFood');
Route::post('admin/updatefood', [CrudFoodController::class, 'postUpdateFood'])->name('food.postUpdateFood');
Route::get('delete', [CrudFoodController::class, 'deleteFood'])->name('food.deleteFood');

//branches
Route::get('addbranches', [CrudBranchesController::class, 'addbranches'])->name('addbranches');
Route::post('addbranches', [CrudBranchesController::class, 'postaddBranch'])->name('addbranches.postaddBranch');
Route::get('listbranches', [CrudBranchesController::class, 'listBranches'])->name('listbranches');;
Route::get('updatebranches', [CrudBranchesController::class, 'updatebranches'])->name('updatebranches');
Route::post('updatebranches', [CrudBranchesController::class, 'postUpdatebranches'])->name('updatebranches.postUpdatebranches');

Route::get('deletebranches', [CrudBranchesController::class, 'deletebranches'])->name('deletebranches');
//staff
Route::get('staff/list', [CrudStaffController::class, 'listStaff'])->name('staff.list');
Route::get('staff/add', [CrudStaffController::class, 'addStaff'])->name('staff.add');
Route::post('staff/add', [CrudStaffController::class, 'postStaff'])->name('staff.post');
Route::get('staff/delete', [CrudStaffController::class, 'deleteStaff'])->name('staff.delete');
Route::get('staff/update', [CrudStaffController::class, 'updateStaff'])->name('staff.updateStaff');
Route::post('staff/update', [CrudStaffController::class, 'postUpdateStaff'])->name('staff.postUpdateStaff');
//dinnertable
Route::get('dinnertable/list', [CrudDinnerTableController::class, 'listDinnerTable'])->name('dinnertable.list');
Route::get('dinnertable/add', [CrudDinnerTableController::class, 'addDinnerTable'])->name('dinnertable.add');
Route::post('dinnertable/add', [CrudDinnerTableController::class, 'postDinnerTable'])->name('dinnertable.post');
Route::get('dinnertable/update', [CrudDinnerTableController::class, 'updateDinnerTable'])->name('table.update');
Route::post('dinnertable/update', [CrudDinnerTableController::class, 'postUpdateDinnerTable'])->name('table.postUpdateTable');
Route::get('dinnertable/delete', [CrudDinnerTableController::class, 'deletedinnerTable'])->name('table.delete');

Route::get('list_news', [CrudNewsController::class, 'listNews'])->name('listNews');
Route::get('add_news', [CrudNewsController::class, 'addNews'])->name('add_news');
Route::post('add_news', [CrudNewsController::class, 'add_News'])->name('addNews');
Route::post('update_news', [CrudNewsController::class, 'postUpdateNews'])->name('updateNews');
Route::get('update_news', [CrudNewsController::class, 'updateNews'])->name('update_news');
Route::get('delete_news', [CrudNewsController::class, 'deleteNews'])->name('delete_news');
Route::get('/user/find', [CrudUserController::class, 'findUser'])->name('user.find');
Route::get('list_voucher', [CrudVoucherController::class, 'listVoucher'])->name('voucher.list');



Route::get('admin/voucher', [CrudVoucherController::class, 'voucher'])->name('voucher');
Route::post('admin/voucher', [CrudVoucherController::class, 'postVoucher'])->name('voucher.postVoucher');
Route::get('list_voucher', [CrudVoucherController::class, 'listVoucher'])->name('voucher.list');
Route::get('admin/updatevoucher/{id}', [CrudVoucherController::class, 'editVoucher'])->name('voucher.edit');
Route::post('admin/updatevoucher', [CrudVoucherController::class, 'postUpdateVoucher'])->name('voucher.postUpdateVoucher');
Route::get('deletevoucher', [CrudVoucherController::class, 'deleteVoucher'])->name('voucher.deleteVoucher');


