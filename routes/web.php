<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::get('/product-details', function () {
    return view('product-details');
});

Route::get('/cart', function () {
    return view('cart');
})->middleware('user.logged.in');

Route::get('/logout', function () {
    Session::flush();
    return redirect('/login');
});

Route::prefix('/login')->group(function() {
    //pertama kali login, masukin email
    Route::get('/', function () { return view('auth.login'); });
    Route::post('/', [AuthController::class, 'login']);

    //Middleware: Mengharuskan user memasukan email yang benar terlebih dahulu
    Route::middleware('auth.user.found')->group(function () {
        //kalau user belum punya password, minta buat password
        Route::get('/setup', function() { return view('auth.setup_password'); });
        Route::post('/setup', [AuthController::class, 'loginSetup']);

        //kalau user sudah punya password, minta masukan password yang benar
        Route::get('/password', function() { return view('auth.enter_password'); });
        Route::post('/password', [AuthController::class, 'loginPassword']);
    });
});

Route::prefix('/register')->group(function() {
    Route::get('/', function () {
        return view('auth.register');
    });
    Route::post('/', [AuthController::class, 'register']);
});

Route::prefix('/product')->group(function() {
    Route::get('/', [BarangController::class, 'viewProducts']);
});

Route::middleware('user.logged.in')->group(function () {
    Route::prefix('/profile')->group(function () {
        Route::get('/', [ProfileController::class, 'view']);
        Route::post('/', [ProfileController::class, 'update']);
        Route::post('/npwp', [ProfileController::class, 'updateNPWP']);
    });

});

