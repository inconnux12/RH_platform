<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\User\CongeController;
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
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::Post('/login',[LoginController::class,'store']);
Route::post('/logout',[LogoutController::class,'logout'])->name('logout');

Route::get('/',[DashboardController::class,'index'])->name('dashboard')->middleware('auth');

Route::get('/admin',function(){
    return view('admin');
})->name('admin')->middleware('admin');

Route::get('/conge',[CongeController::class,'index'])->name('conge');
Route::get('/conge/add',[CongeController::class,'create'])->name('conge_add');
Route::post('/conge/add',[CongeController::class,'store']);
Route::get('/conge/list',[CongeController::class,'indexAdmin'])->name('indexAdmin');
