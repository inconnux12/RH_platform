<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Pages\PagesController;
use App\Http\Livewire\AbsencesComponent;
use App\Http\Livewire\ContractsComponent;
use App\Http\Livewire\UsersComponent;
use App\Http\Livewire\VacationsComponent;
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

Route::get('/vacations',VacationsComponent::class)->name('vacations')->middleware('auth');
Route::get('/absences',AbsencesComponent::class)->name('absences')->middleware('auth');
Route::get('/contracts',ContractsComponent::class)->name('contracts')->middleware('auth');
Route::get('/users',UsersComponent::class)->name('users')->middleware('auth');