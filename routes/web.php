<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlantsController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\AttendanceController;

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


Route::group(['middleware'=>'auth'] , function (){


Route::get('/',[UserController::class, 'index'])->name('users') ;
Route::post('user',[UserController::class, 'create'])->name('users.store') ;
Route::get('user/delete/{user}', [UserController::class, 'delete']);
Route::post('user/edit', [UserController::class, 'edit'])->name('user.edit');


Route::get('plant',[PlantsController::class, 'index'])->name('plant');
Route::post('plant',[PlantsController::class, 'store']) ;
Route::post('plant/edit', [PlantsController::class, 'update'])->name('plant.edit');
Route::get('plant/delete/{plant}', [PlantsController::class, 'delete']);

Route::get('attendance/in',[AttendanceController::class, 'signIn'])->name('attendance.signIn');
Route::post('attendance/in',[AttendanceController::class, 'store_signIn'])->name('attendance.store_signIn');

Route::get('attendance/exist',[AttendanceController::class, 'signOut'])->name('attendance.signOut');


Route::resource('trainer', TrainerController::class);

});
