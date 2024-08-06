<?php

use App\Http\Controllers\Agent\AgentDashboardController;
use App\Http\Controllers\Agent\AgentRegisterController;
use App\Http\Controllers\Agent\ChangePasswordController;
use App\Http\Controllers\Agent\EditAgentProfileController;
use App\Http\Controllers\Agent\ImageController;
use App\Http\Controllers\Agent\OrderController;
use App\Http\Controllers\Agent\PaymentController;
use App\Http\Controllers\Agent\PaypalController;
use App\Http\Controllers\Agent\PropertyController;
use App\Http\Controllers\Agent\VideoController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\theme\AgentController;
use App\Http\Controllers\theme\BlogController;
use App\Http\Controllers\theme\ContactController;
use App\Http\Controllers\theme\FaqController;
use App\Http\Controllers\theme\HomeController;
use App\Http\Controllers\theme\LocationController;
use App\Http\Controllers\theme\PackageController;
use App\Http\Controllers\theme\SearchController;
use App\Http\Controllers\theme\SubscribeController;
use App\Http\Controllers\User\EditUserController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\UserRegisterController;
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

Route::name('theme.')->group(function () {
    Route::get('/', HomeController::class)->name('index');
    Route::get('Pricing',PackageController::class)->name('pricing');
    Route::get('FAQ',FaqController::class)->name('faq');
    Route::resource('blogs',BlogController::class)->only(['index', 'show']);
    Route::resource('locations',LocationController::class)->only(['index', 'show']);
    Route::resource('agents',AgentController::class)->only(['index', 'show']);
    Route::resource('properties',App\Http\Controllers\theme\PropertyController::class)->only(['index', 'show']);
    Route::post('subscribers',[SubscribeController::class,'store']);
    Route::get('/contact',[ContactController::class,'create'])->name('contact');
    Route::post('/contact',[ContactController::class,'store'])->name('contact.store');
    Route::get('/search',[SearchController::class,'search'])->name('search');
});

Route::middleware(['auth','role:user'])->prefix('user')->name('user.')->group(function () {
    Route::get('dashboard',[UserDashboardController::class,'index'])->name('dashboard');
    Route::get('dashboard/profile',[EditUserController::class,'edit'])->name('profile');
});

Route::middleware(['auth','role:agent'])->prefix('agent')->name('agent.')->group(function () {
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
});

Route::middleware('guest')->group(function () {
    Route::get('agent/register',[AgentRegisterController::class,'create'])->name('agent.register');
    Route::post('agent/register',[AgentRegisterController::class,'store'])->name('agent.store');
    Route::get('user/register',[UserRegisterController::class,'create'])->name('user.register');
    Route::post('user/register',[UserRegisterController::class,'store'])->name('user.store');
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');

});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});

require __DIR__.'/auth.php';
