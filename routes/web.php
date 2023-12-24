<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[DashboardController::class, 'index']);

//Route::get('/user/list', [UserController::class, 'getUserList'])->name('user.list');
//
//Route::get('get-user-details',[UserController::class, 'getUserDetails'])->name('user.details');


Route::post('/user/add', [UserController::class, 'addUser'])->name('users.store');
Route::get('user-datatable',[UserController::class, 'datatable'])->name('user.datatable');

Route::put('/user/edit/{user}', [UserController::class, 'editUser'])->name('user.edit');
Route::put('/user/update', [UserController::class, 'updateUser'])->name('user.update');

Route::delete('/user/delete/{user}', [UserController::class, 'deleteUser'])->name('user.delete');



