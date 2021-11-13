<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Owner\CabangController;
use App\Http\Controllers\Owner\KasirController;
use App\Http\Controllers\Owner\OwnerController;
use App\Http\Controllers\Owner\StoreController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Auth::routes(['verify' => true]);
Route::get('/', [HomeController::class, 'index'])->name('signin');
Route::get('/home',[HomeController::class,'redirect'])->name('redirect');

Route::get('rumah',function() {
    return redirect()->route('redirect');
})->name('home');

Route::middleware('auth')->group(function() {
    Route::post("change-profile",[HomeController::class,'updateprofile'])->name('changeprofile');
    Route::post('change-password',[HomeController::class,'password'])->name('changepassword');
});

Route::prefix('my-app')->middleware(['owner','verified'])->group(function() {
    Route::get("/dashboard",[OwnerController::class,'index'])->name('owner.dashboard');

    Route::get("/notif",[OwnerController::class,'notif'])->name('owner.notif');
    Route::get('read/{id}',[OwnerController::class,'read'])->name('owner.notif_read');
    Route::get('all-read',[OwnerController::class,'allread'])->name('owner.notif_all');
    Route::get('my-profile',[OwnerController::class,'myprofile'])->name('owner.profile');

    
    Route::prefix('store')->group(function() {
        Route::get("/my-store",[StoreController::class,'index'])->name('owner.store');
        Route::get("create",[StoreController::class,'create'])->name('owner.store_create');
        Route::get("update",[StoreController::class,'update'])->name('owner.store_update');
        Route::get('edit-cabang/{id}',[CabangController::class,'update'])->name('owner.update_cabang');
        
        Route::post("store",[StoreController::class,'store'])->name('owner.store_post');
        Route::post('cabang/{any}',[CabangController::class,'store'])->name('owner.store_cabang');
    });

    Route::prefix('kasir')->group(function() {
        Route::get("/list",[KasirController::class,'index'])->name('owner.kasir');
        Route::get("/create",[KasirController::class,'create'])->name('owner.create_kasir');
        Route::get("/update/{id}",[KasirController::class,'update'])->name('owner.update_kasir');
        Route::get("/delete/{id}",[KasirController::class,'delete'])->name('owner.delete_kasir');
        Route::post("store",[KasirController::class,'store'])->name('owner.store_kasir');
        Route::post("edit",[KasirController::class,'edit'])->name('owner.store_edit');
    });
});
 
