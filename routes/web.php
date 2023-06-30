<?php

use App\Http\Controllers\GoogleLoginController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//google login
Route::get('auth/google/redirect', [GoogleLoginController::class, 'googleRedirect']);
Route::get('auth/google/callback', [GoogleLoginController::class, 'loginWithGoogle']);

//Route::get('redirectUser', 'App\Http\Controllers\HomeController@Index');
