<?php

use App\Http\Controllers\User\EditUserController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\WishlistController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth','verified','role:user'])->prefix('user')->name('user.')->group(function () {
    Route::get('dashboard',[UserDashboardController::class,'index'])->name('dashboard');
    Route::get('dashboard/profile',[EditUserController::class,'edit'])->name('profile');
    Route::PUT('dashboard/profile',[EditUserController::class,'update'])->name('profile.update');
    Route::resource('dashboard/wishlist',WishlistController::class);
});

require __DIR__.'/auth.php';
