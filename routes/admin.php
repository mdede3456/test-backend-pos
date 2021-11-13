<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;

Route::middleware('admin')->group(function() {
    Route::get("/dashboard",[AdminController::class,'index'])->name('admin.dashboard');
    Route::get("/notif",[AdminController::class,'notif'])->name('admin.notif');
    Route::get('read/{id}',[AdminController::class,'read'])->name('admin.notif_read');
    Route::get('all-read',[AdminController::class,'allread'])->name('admin.notif_all');
    Route::get('my-profile',[AdminController::class,'myprofile'])->name('admin.profile');

    Route::prefix('pengaturan')->group(function() {
        Route::get("/update",[SettingController::class,'index'])->name('settings');
        Route::post("store",[SettingController::class,'store'])->name('settings.store');
    });

    Route::prefix('store')->group(function() {
        Route::get("/pending",[StoreController::class,'pending'])->name('admin.store_pending');
        Route::get("/active",[StoreController::class,'index'])->name('admin.store_active');
        Route::get("/detail/{id}",[StoreController::class,'detail'])->name('admin.store_detail');
        Route::get("create",[StoreController::class,'create'])->name('admin.create_store');

        Route::get("cabang",[StoreController::class,'cabang'])->name('admin.cabang');

        Route::post("approval",[StoreController::class,'approval'])->name('admin.store_approval');
        Route::post('add-limit',[StoreController::class,'addlimit'])->name('admin.add_limit');
        Route::post('add-active',[StoreController::class,'addactive'])->name('admin.add_active');
        Route::post("store",[StoreController::class,'store'])->name('admin.buattoko');
    });

    Route::prefix('admin')->group(function() {
        Route::get('list',[UsersController::class,'admin'])->name('admin.admin');
        Route::get('create',[UsersController::class,'create_admin'])->name('admin.create');
        Route::get('update/{id}',[UsersController::class,'update_admin'])->name('admin.update');
        Route::get('delete/{id}',[UsersController::class,'delete'])->name('admin.delete');
        
        Route::post("store",[UsersController::class,'store'])->name('admin.store');
        Route::post('edit',[UsersController::class,'edit'])->name('admin.edit');
    });

    Route::prefix('pengguna')->group(function() {
        Route::get('owner',[UsersController::class,'owner'])->name('admin.owner');
        Route::get("kasir",[UsersController::class,'kasir'])->name('admin.kasir');
    });
});