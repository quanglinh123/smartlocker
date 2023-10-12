<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CabinetController;
use App\Http\Controllers\ClusterController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FloorController;
use App\Http\Controllers\StaffController;
use App\Models\Staff;
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

Route::get('/', [AdminController::class,'login']);
Route::post('login',[AdminController::class,'login_action'])->name('login.action');

Route::middleware('checklogin')->group(function(){
    
    Route::middleware('cabinetmanager')->group(function(){

        Route::get('admin', [CabinetController::class,'GetCabinet'])->name('admin');

        Route::get('addcabinet', [CabinetController::class,'create'])->name('addcabinet');

        Route::get('cluster', [ClusterController::class,'GetCluster'])->name('cluster');

        Route::get('floor', [FloorController::class,'GetFloor'])->name('floor');
    });

    Route::get('staff', [StaffController::class,'GetStaff'])->name('staff');

    Route::middleware('staffmanager')->group(function(){
        
        Route::get('addstaff', [StaffController::class,'create'])->name('addstaff');

        Route::post('addstaff',[StaffController::class,'store'])->name('addstaff.action');

        Route::get('department',[DepartmentController::class,'GetDepartment'])->name('department');

        Route::get('adddepartment',[DepartmentController::class,'create'])->name('adddepartment');
    
        Route::post('adddepartment',[DepartmentController::class,'store'])->name('adddepartment.action');

        Route::get('/updatestaff/{staff_id}',[StaffController::class,'edit']);

        Route::post('update',[AdminController::class,'update'])->name('update');
    });

    Route::get('/open/{cabinet_id}',[CabinetController::class,'open']);

    Route::get('/close/{cabinet_id}',[CabinetController::class,'close']);

    Route::get('history', [StaffController::class,'GetHistory'])->name('history');

    Route::get('search',[StaffController::class,'Search'])->name('search');

    Route::get('searchcabin',[CabinetController::class,'Search'])->name('searchcabin');

    Route::get('searchcabin',[CabinetController::class,'Search'])->name('searchcabin');

    Route::get('/update/{staff_id}',[StaffController::class,'AddCabinet']);

    Route::post('AddCabinet.action',[StaffController::class,'AddCabinetaction'])->name('AddCabinet.action');

    Route::get('/clearcabin/{staff_id}',[StaffController::class,'ClearCabinet']);

    Route::get('addcluster',[ClusterController::class,'create'])->name('addcluster');

    Route::post('addcluster',[ClusterController::class,'store'])->name('addcluster.action');

    Route::get('logout',[AdminController::class,'logout'])->name('logout');

    Route::get('account',[AdminController::class,'index'])->name('account');

    Route::get('admin_register',[AdminController::class,'create'])->name('admin_register');

    Route::post('register.action',[AdminController::class,'store'])->name('register.action');
});