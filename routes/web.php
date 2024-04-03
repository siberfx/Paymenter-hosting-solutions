<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Admin\Settings;

Route::get('/', function () {
    return view('home');
});


// Destroy the session and log out the user.
//auth()->logout();
// Authorization routes 
Route::group(['middleware' => ['web', 'guest']], function () {
    Route::get('login', Login::class)->name('login');
    Route::get('register', Register::class)->name('register');
    // Todo
    Route::get('password/reset')->name('password.reset');
    Route::get('/oauth/{provider}')->name('oauth');
});

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    //Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('profile', function () {
        return view('profile');
    })->name('profile');
});

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('settings', Settings::class)->name('settings')->middleware('has:admin.settings.view');
});
