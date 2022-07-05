<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SocialController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\FullCalenderController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CheatsheetController;


//Logout
Route::get('/logout', function(){
    Auth::logout();
    return redirect('/');
})->name('logout');

//Social Login
Route::get('/auth/redirect/{social}', [SocialController::class, 'redirect']);
Route::get('/callback/{social}', [SocialController::class, 'callback']);

//Backend (User)
Route::prefix('/user')->middleware(['auth','user'])->group(function () {
    //Dashboard
    Route::get('/', [UserController::class, 'dashboard']);
    
    //Stripe example
    Route::get('/stripe-integration', [UserController::class, 'exampleStripe'])->name('billing');
    Route::get('/checkout/{id}', [CheckoutController::class, 'checkout'])->name('checkout');
    Route::post('/checkout', [CheckoutController::class, 'processCheckout'])->name('checkout.process');
    Route::get('/cancel', [UserController::class, 'stripeCancel'])->name('cancel');
    Route::get('/resume', [UserController::class, 'stripeResume'])->name('resume');

    //Calender example
    Route::get('/calendar', [FullCalenderController::class, 'index'])->name('calendar');
    Route::post('/fullcalendarAjax', [FullCalenderController::class, 'ajax']);

    //Social login example (Google, Linkedin)
    Route::get('/socials-login', [UserController::class, 'exampleSocials']);

    //Livewire examples
    Route::view('/unique-slug','backend.exampleLivewire')->name('unique_slug');
    Route::view('/dependent-dropdown','backend.exampleLivewire')->name('dependent_dropdown');

    //Projects redirect
    Route::get('/projects/{name}', [UserController::class, 'internalProjects']);
});

//Backend (Admin)
Route::prefix('/admin')->middleware(['auth','admin'])->group(function () {
    Route::get('/', [AdminController::class, 'dashboard']);
    Route::resource('/projects', ProjectController::class);
    Route::get('/project-position/up/{id}', [AdminController::class, 'projectPositionUp']);
    Route::get('/project-position/down/{id}', [AdminController::class, 'projectPositionDown']);
    Route::resource('cheatsheets', CheatsheetController::class);
});

//Frontend
Route::controller(FrontendController::class)->group(function () {
    Route::get('/remember-project/{name}/{social}', 'socialLoginRememberProject');
    Route::get('/', 'landing')->name('landing');
    Route::get('/jobs', 'jobs')->name('jobs');
    Route::get('/cheatsheets','cheatsheets')->name('cheatsheets');
});
