<?php

use App\Http\Controllers\RoleController;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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
    return view('layouts.app');
//    $result = Role::find(1);
//     dd($result->permissions);

    // dd(Role::find(1)->givePermissionTo('delete post','delete user'));

    // dd(Auth::user()->can('delete post'));


})->name('home')->middleware('auth');


Route::prefix('auth')->group(function(){

    Route::get('/login',[LoginController::class,'showLoginForm'])->name('auth.login.form');
    Route::post('/login',[LoginController::class,'login'])->name('auth.login');
    Route::get('/logout',[LoginController::class,'logout'])->name('auth.logout');

    Route::get('/register',[RegisterController::class,'showRegisterForm'])->name('auth.register.form');
    Route::post('/register',[RegisterController::class,'store'])->name('auth.register');

});


Route::prefix('panel')->group(function(){

    Route::get('/users',[UserController::class,'index'])->name('users.index');
    Route::get('/users/{user}/edit',[UserController::class,'edit'])->name('users.edit');
    Route::post('/users/{user}/edit',[UserController::class,'update'])->name('users.update');

    Route::get('/roles',[RoleController::class,'index'])->name('roles.index');
    Route::get('/roles/{role}/edit',[RoleController::class,'edit'])->name('roles.edit');
    Route::post('/roles/{role}/edit',[RoleController::class,'update'])->name('roles.update');
    Route::get('/roles/create',[RoleController::class,'create'])->name('roles.create');
    Route::post('/roles',[RoleController::class,'store'])->name('roles.store');

});
