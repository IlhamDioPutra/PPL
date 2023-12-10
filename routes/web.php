<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DaftarKegiatanController;

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


Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->middleware('guest')->name('login');
    Route::Post('/login', 'authenticate');
    Route::Post('/logout', 'logout')->name('logout');

});

Route::middleware(['auth'])->group(function () {
    Route::redirect('/', '/dashboard');
    Route::view('/dashboard', 'Dashboard.dashboard')->name('dashboard');
});
Route::get('RBA/DaftarKegiatan/export', [DaftarKegiatanController::class, 'export'])->middleware('auth')->name('RBA.DaftarKegiatan.Export');
Route::post('RBA/DaftarKegiatan/import', [DaftarKegiatanController::class, 'import'])->middleware('auth')->name('RBA.DaftarKegiatan.Import');

Route::middleware(['auth'])->group(function () {
    Route::name('RBA.')->prefix('RBA')->group( function () {
        Route::resource('DaftarKegiatan', DaftarKegiatanController::class);
    });


        

});