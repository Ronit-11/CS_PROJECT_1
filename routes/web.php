<?php

use App\Http\Controllers\GoogleLoginController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

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

Route::get('/',[\App\Http\Controllers\WelcomeController::class, 'index'])->name('servStart');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard',[\App\Http\Controllers\WelcomeController::class, 'index']
    /*function () {
        return view('dashboard');
    }*/)->name('dashboard');
});

//google login
Route::get('auth/google/redirect', [GoogleLoginController::class, 'googleRedirect']);
Route::get('auth/google/callback', [GoogleLoginController::class, 'loginWithGoogle']);

//welcome display
//Route::get('/dashboard1',[\App\Http\Controllers\WelcomeController::class, 'index']);
//Route::get('redirectUser', 'App\Http\Controllers\HomeController@Index');
