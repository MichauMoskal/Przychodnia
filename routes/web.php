<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\NoneController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AppointmentController;
use \App\Http\Controllers\ServiceController;

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

Route::get("/redirectUsers", [\App\Http\Controllers\RedirectUsers::class,'index']);

Route::get('/', [NoneController::class,'index'])->name('none.panel');
Route::get('/about', [NoneController::class,'about'])->name('none.about');
Route::get('/services',[ServiceController::class,'index'])->name('services');

Route::group(['middleware' => 'auth'], function() {
    Route::post('/appointment/add', [AppointmentController::class,'addAppointment'])->name('appointment.add');
    Route::group(['middleware' => 'role:admin'], function() {
        Route::get('/adminPanel', [AdminController::class,'index'])->name('admin.panel');
        Route::get('/appointments',[AppointmentController::class,'index'])->name('appointments');
        Route::get('/appointment/plan/{user}',[AppointmentController::class,'planAppointment'])->name('appointment.plan');
        Route::get('/appointments/toapprove',[AppointmentController::class,'toApprove'])->name('appointment.toApprove');
        Route::post('/appointment/delete', [AdminController::class,'deleteAppointment'])->name('admin.appointment.delete');
        Route::post('/appointment/approve', [AppointmentController::class,'approve'])->name('appointment.approve');
        Route::post('/appointment/accept', [AdminController::class,'acceptAppointment'])->name('admin.appointment.accept');
        Route::post('/user/delete', [AdminController::class,'deleteUser'])->name('admin.user.delete');
        Route::post('/admin/details/update', [AdminController::class,'updateUser'])->name('admin.updateUser');
    });
    Route::group(['middleware' => 'role:user'], function() {
        Route::get('/userPanel', [UserController::class,'index'])->name('user.panel');
        Route::post('/user/appointment/add', [UserController::class,'addAppointment'])->name('user.appointment.add');
        Route::post('/user/details/update', [UserController::class,'updateUser'])->name('user.updateUser');
    });


});


require __DIR__.'/auth.php';
