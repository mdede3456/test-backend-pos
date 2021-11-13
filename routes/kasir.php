<?php

use App\Http\Controllers\Kasir\KasirController;
use Illuminate\Support\Facades\Route;


 
 
Route::middleware('kasir')->group(function() {
    Route::get("/dashboard",[KasirController::class,'index'])->name('kasir.dashboard');

    Route::get("/notif",[KasirController::class,'notif'])->name('kasir.notif');
    Route::get('read/{id}',[KasirController::class,'read'])->name('kasir.notif_read');
    Route::get('all-read',[KasirController::class,'allread'])->name('kasir.notif_all');
    Route::get('my-profile',[KasirController::class,'myprofile'])->name('kasir.profile');

});