<?php

use App\Http\Controllers\Agent\AgentRegisterController;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\theme\AgentController;
use App\Http\Controllers\theme\BlogController;
use App\Http\Controllers\theme\ContactController;
use App\Http\Controllers\theme\EnquiryController;
use App\Http\Controllers\theme\FaqController;
use App\Http\Controllers\theme\HomeController;
use App\Http\Controllers\theme\LocationController;
use App\Http\Controllers\theme\PackageController;
use App\Http\Controllers\theme\PrivacyController;
use App\Http\Controllers\theme\SearchController;
use App\Http\Controllers\theme\SubscribeController;
use App\Http\Controllers\theme\TermController;
use App\Http\Controllers\theme\WishlistController;
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
    Route::post('enquiry',EnquiryController::class);
    Route::get('/contact',[ContactController::class,'create'])->name('contact');
    Route::post('/contact',[ContactController::class,'store'])->name('contact.store');
    Route::get('/search',[SearchController::class,'search'])->name('search');
    Route::post('/wishlist',[WishlistController::class,'store']);
    Route::get('terms',[TermController::class,'index'])->name('terms');
    Route::get('privacy',[PrivacyController::class,'index'])->name('privacy');
    Route::middleware(['auth','role:user'])->group(function (){
       Route::post('wishlist',[WishlistController::class,'store'])->name('wishlist.store');
       Route::delete('wishlist/remove',[WishlistController::class,'destroy'])->name('wishlist.destroy');
    });
});

require __DIR__.'/auth.php';
