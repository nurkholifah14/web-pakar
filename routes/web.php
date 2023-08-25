<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\JeniskulitController;
use App\Http\Controllers\GejalakulitController;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\DataDiagnosaController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\WhatsAppController;
use App\Http\Controllers\InfodiskonController;
use App\Http\Controllers\Auth\ForgotPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(["middleware" => ["can:user"]], function() {
    Route::post('/diagnosa', [DiagnosaController::class, 'riwayat']);
    Route::post('/proses-diagnosa', [DiagnosaController::class, 'process']);
    Route::get('/identitas', function (){
        return view('/diagnosa/identitas');
    });
    Route::get('/profile', [LoginController::class, 'profile']);
    Route::post('/update', [LoginController::class, 'update']);
    Route::get('/riwayat', [DiagnosaController::class, 'riwayatDiagnosa']);
    Route::get('/send-whatsapp/{id}', [WhatsappController::class, 'index']);
    Route::post('/send-whatsapp', [WhatsAppController::class, 'sendMessage'])->name('send.whatsapp');
});


// Admin Routes
Route::group(["middleware" => ["hakakses"]], function() {
    Route::group(["middleware" => ["can:admin"]], function() {
        Route::get('admin', [AdminController::class, 'dashboard']);
        Route::resource('jeniskulit', JeniskulitController::class);
        Route::resource('gejalakulit', GejalakulitController::class);
        Route::resource('treatment', TreatmentController::class);
        Route::resource('data-pengguna', PenggunaController::class);
        Route::resource('data-diagnosa', DataDiagnosaController::class);
        Route::get('/riwayat-diagnosa', [DiagnosaController::class, 'riwayat_diagnosa']);
        Route::delete('/riwayat-diagnosa/{id}', [DiagnosaController::class, 'destroy']);
    
        //diskon
        Route::group(['prefix' => '/diskon'], function () {
            Route::get('/', [InfodiskonController::class, 'index'])->name('diskon');
            Route::get('/create', [InfodiskonController::class, 'create'])->name('diskon.create');
            Route::post('/store', [InfodiskonController::class, 'store'])->name('diskon.store');
            Route::get('/edit/{id}', [InfodiskonController::class, 'edit'])->name('diskon.edit');
            Route::post('/update/{id}', [InfodiskonController::class, 'update'])->name('diskon.update');
            Route::delete('/destroy/{id}', [InfodiskonController::class, 'destroy'])->name('diskon.destroy');
        });
    });
});

Route::group(["middleware" => ["guest"]], function() {
    Route::get('/login', [LoginController::class, 'index']);
    Route::post('/login', [LoginController::class, 'authenticate']);
});

Route::get('/hasil/{id}', [DiagnosaController::class, 'hasil_diagnosa']);
Route::get('/hasil_pdf/{id}', [DiagnosaController::class, 'cetak_pdf']);

Route::get('/', function () {   
    return view('/user/landingpage/landing');
});

Route::get('/informasi-JenisKulit', function () {
    return view('/user/informasi/jeniskulit');
});
Route::get('informasi-Treatment', [TreatmentController::class, 'treatment']);
Route::get('informasi-Diskon', [InfodiskonController::class, 'diskon']);

Route::get('/tentang', function () {
    return view('/user/tentang/index');
});

Route::get('/kontak', function () {
    return view('/user/kontak/index');
});



Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);
Route::post('/update-password', [LoginController::class, 'updatePassword']);
Route::post('/update-profile', [LoginController::class, 'updateProfile']);
Route::get('/logout', [LoginController::class, 'logout']);


Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');