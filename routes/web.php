<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LapanganController;
use App\Http\Controllers\PemilikController;
use App\Http\Controllers\PenyewaController;
use App\Http\Controllers\JenislapanganController;

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

Route::get('/', function () {
    return view('page.beranda');
});

Route::get('/beranda', function () {
    return view('page.beranda');
});

Route::get('/about', function () {
    return view('page.about');
});

Route::resource('/jenislapangan',JenislapanganController::class)->middleware('auth');
Route::resource('/lapangan',LapanganController::class)->middleware('auth');
Route::resource('/pemilik',PemilikController::class)->middleware('auth');
Route::resource('/penyewa',PenyewaController::class)->middleware('auth');
Route::get('lapanganpdf',[LapanganController::class,'PDF'])->middleware('auth');
Route::get('pemilikpdf',[PemilikController::class,'PDF'])->middleware('auth');
Route::get('penyewapdf',[PenyewaController::class,'PDF'])->middleware('auth');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/afterRegister', function () {
    return view('page.afterRegister');
});