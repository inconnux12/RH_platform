<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\User\AbsencesController;
use App\Http\Controllers\User\AffectationController;
use App\Http\Controllers\User\CongeController;
use App\Http\Controllers\User\ContratController;
use App\Http\Controllers\User\EmployerController;
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

Route::get('/conge',[CongeController::class,'index'])->name('conge')->middleware('emuser');
Route::get('/conge/add',[CongeController::class,'create'])->name('conge_add')->middleware('emuser');
Route::post('/conge/add',[CongeController::class,'store']);
Route::get('/conge/list',[CongeController::class,'indexAdmin'])->name('indexAdminconge')->middleware('rsuser');

Route::get('/affectation',[AffectationController::class,'index'])->name('affectation')->middleware('emuser');
Route::get('/affectation/add',[AffectationController::class,'create'])->name('affectation_add')->middleware('emuser');
Route::post('/affectation/add',[AffectationController::class,'store']);
Route::get('/affectation/list',[AffectationController::class,'indexAdmin'])->name('indexAdminaffectation')->middleware('rsuser');
Route::get('/affectation/users/list',[AffectationController::class,'responsable_affectation'])->name('rs_affectation')->middleware('rhuser');

Route::get('/employer',[EmployerController::class,'index'])->name('users')->middleware('admin');

Route::get('/absences',[AbsencesController::class,'index'])->name('absences')->middleware('rsuser');

Route::get('/contrats',[ContratController::class,'index'])->name('contracts')->middleware('rhuser');
