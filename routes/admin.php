<?php

use App\Http\Controllers\admin\AdminProfileController;
use App\Http\Controllers\admin\AgentController;
use App\Http\Controllers\admin\AmenityController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\ChooseController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\CustomerController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\FaqController;
use App\Http\Controllers\admin\LocationController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\PackageController;
use App\Http\Controllers\admin\PrivacyController;
use App\Http\Controllers\admin\PropertyController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\SubscribeController;
use App\Http\Controllers\admin\TermController;
use App\Http\Controllers\admin\TestimonialController;
use App\Http\Controllers\admin\TypeController;
use App\Http\Controllers\adminAuth\AuthenticatedSessionController;
use App\Http\Controllers\adminAuth\NewPasswordController;
use App\Http\Controllers\adminAuth\PasswordResetLinkController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::middleware('isAdmin')->group(function () {
        Route::get('/', DashboardController::class, 'index')->name('index');
        Route::get('profile', [AdminProfileController::class, 'edit'])->name('profile.edit');
        Route::put('profile', [AdminProfileController::class, 'update'])->name('profile.update');
        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
        Route::resource('chooses', ChooseController::class)->except('show');
        Route::resource('testimonials', TestimonialController::class)->except('show');
        Route::resource('terms', TermController::class)->except('show');
        Route::resource('privacies', PrivacyController::class)->except('show');
        Route::resource('blogs', BlogController::class)->except('show');
        Route::resource('locations', LocationController::class)->except('show');
        Route::resource('types', TypeController::class)->except('show');
        Route::resource('amenities', AmenityController::class)->except('show');
        Route::resource('properties', PropertyController::class)->only('index','destroy');
        Route::resource('packages', PackageController::class)->except('show');
        Route::resource('faqs', FaqController::class)->except('show');
        Route::resource('customers', CustomerController::class)->only('index','destroy');
        Route::resource('agents', AgentController::class)->only('index','destroy');
        Route::resource('orders',OrderController::class)->only('index','destroy');
        Route::resource('subscribers',SubscribeController::class);
        Route::get('contacts',[ContactController::class,'index'])->name('contacts.index');
        Route::delete('contacts/{contact}',[ContactController::class,'destroy'])->name('contacts.destroy');
        Route::resource('settings',SettingController::class)->except('show');
    });
    Route::middleware('guest')->group(function () {
        Route::get('login', [AuthenticatedSessionController::class, 'create'])
            ->name('login');
        Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login.store');
        Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
            ->name('password.request');

        Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
            ->name('password.email');

        Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
            ->name('password.reset');

        Route::post('reset-password', [NewPasswordController::class, 'store'])
            ->name('password.store');
    });

});
