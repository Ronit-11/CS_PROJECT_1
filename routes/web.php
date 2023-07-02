<?php

use App\Http\Controllers\GoogleLoginController;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
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
    if (Route::has('login')){
        $Productdata = Product::all();
        if(Auth::user()){
            return view('dashboard', [
                'products' => $Productdata
            ]);
        } else {
            return view('welcome', [
                'products' => $Productdata
            ]);
        }
    }
});

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
