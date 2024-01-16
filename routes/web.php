<?php

use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::middleware(['web', 'guest'])->group(function () {

    Route::get('/login', [AuthController::class, 'loginForm'])->name('login.form');
});
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/language-switch', [LanguageController::class,'switchLanguage'])->name('language.switch');

// routes/web.php
Route::middleware('auth')->group(function (){
    Route::group(['prefix'=>'invoice','as'=>'invoice.'],function () {
        Route::get('index', [InvoiceController::class, 'index'])->name('index');
        Route::get('show/{invoice}', [InvoiceController::class, 'show'])->name('show');
        Route::get('download/{invoice}',[InvoiceController::class, 'generatePDF'])->name('generate.pdf');
    });
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::fallback(function () {
    if (!auth()->check()) {
        return redirect('/login');
    }
});

