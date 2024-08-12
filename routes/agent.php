<?php
use App\Http\Controllers\Agent\ChangePasswordController;
use App\Http\Controllers\Agent\EditAgentProfileController;
use App\Http\Controllers\Agent\ImageController;
use App\Http\Controllers\Agent\OrderController;
use App\Http\Controllers\Agent\PaymentController;
use App\Http\Controllers\Agent\PaypalController;
use App\Http\Controllers\Agent\PropertyController;
use App\Http\Controllers\Agent\StripeController;
use App\Http\Controllers\Agent\VideoController;
use App\Http\Controllers\Agent\AgentDashboardController;

use Illuminate\Support\Facades\Route;

Route::middleware(['auth','verified','role:agent'])->prefix('agent')->name('agent.')->group(function () {
    Route::get('dashboard',[AgentDashboardController::class,'index'])->name('dashboard');
    Route::get('dashboard/profile',[EditAgentProfileController::class,'edit'])->name('profile');
    Route::post('dashboard/profile',[EditAgentProfileController::class,'update'])->name('profile.update');
    Route::get('dashboard/password',[ChangePasswordController::class,'edit'])->name('password');
    Route::post('dashboard/password',[ChangePasswordController::class,'update'])->name('password-update');
    Route::resource('dashboard/properties', PropertyController::class)->except('show');
    Route::get('dashboard/property/{property}/images',[ImageController::class,'index'])->name('images.index');
    Route::post('dashboard/property/{property}/images',[ImageController::class,'store'])->name('images.store');
    Route::delete('agent/dashboard/property/images/{id}',[ImageController::class,'destroy'])->name('images.destroy');
    Route::get('dashboard/property/{property}/videos',[VideoController::class,'index'])->name('videos.index');
    Route::post('dashboard/property/{property}/videos',[VideoController::class,'store'])->name('videos.store');
    Route::delete('agent/dashboard/property/video/{id}',[VideoController::class,'destroy'])->name('videos.destroy');
    Route::get('dashboard/payment',PaymentController::class)->name('package.payment');
    Route::post('payment',[PayPalController::class,'paypal'])->name('payment');
    Route::get('success',[PaypalController::class,'success'])->name('payment.success');
    Route::get('cancel',[PaypalController::class,'cancel'])->name('payment.cancel');
    Route::get('dashboard/orders',OrderController::class)->name('orders');
    Route::post('activate-property',[PropertyController::class,'activate'])->name('property.activate');
    Route::post('/charge', [StripeController::class, 'stripe'])->name('stripe');
    Route::get('/stripe/success', [StripeController::class, 'success'])->name('stripe.success');
    Route::get('/stripe/cancel', [StripeController::class, 'cancel'])->name('stripe.cancel');
});

require __DIR__.'/auth.php';
