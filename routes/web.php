<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RincianTupController;
use App\Http\Controllers\SpjBelanjaGupController;
use App\Http\Controllers\SpjBelanjaTupController;
use App\Http\Controllers\DaftarKegiatanController;
use App\Http\Controllers\RekapKinerjaUpkController;
use App\Http\Controllers\RekapitulasiAkhirController;
use App\Http\Controllers\RekapAjuanKegiatanController;

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



Route::get('RBA/RekapAjuanKegiatan/export', [RekapAjuanKegiatanController::class, 'export'])->middleware('auth')->name('RBA.RekapAjuanKegiatan.Export');
Route::post('RBA/RekapAjuanKegiatan/import', [RekapAjuanKegiatanController::class, 'import'])->middleware('auth')->name('RBA.RekapAjuanKegiatan.Import');

Route::middleware(['auth'])->group(function () {
    Route::name('RBA.')->prefix('RBA')->group( function () {
        Route::resource('RekapAjuanKegiatan', RekapAjuanKegiatanController::class);
    });
});
Route::get('RBA/RekapitulasiAkhir/export', [RekapitulasiAkhirController::class, 'export'])->middleware('auth')->name('RBA.RekapitulasiAkhir.export');
Route::middleware(['auth'])->group(function () {
    Route::controller(RekapitulasiAkhirController::class)->group(function () {
        Route::get('/RBA/RekapitulasiAkhir', 'index')->name('RBA.RekapitulasiAkhir.index');
    });
});



Route::get('TUP/SpjBelanjaTup/{SpjBelanjaTup}/download', [SpjBelanjaTupController::class, 'downloadTup'])->middleware('auth')->name('TUP.SpjBelanjaTup.Download');

Route::middleware(['auth'])->group(function () {
    Route::name('TUP.')->prefix('TUP')->group( function () {
        Route::resource('SpjBelanjaTup', SpjBelanjaTupController::class);
    });
});

Route::middleware(['auth'])->group(function () {
    Route::controller(RincianTupController::class)->group(function () {
        Route::get('/TUP/RincianTup', 'index')->name('Tup.RincianTup.index');
        Route::get('/TUP/RincianTup/{bulan}', 'lihatDetail')->name('Tup.RincianTup.detail');
        Route::get('/TUP/RincianTup/export/{bulan}', 'export')->name('Tup.RincianTup.export');
 
    });
});

Route::get('GUP/SpjBelanjaGup/{SpjBelanjaGup}/download', [SpjBelanjaGupController::class, 'downloadGup'])->middleware('auth')->name('GUP.SpjBelanjaGup.download');

Route::middleware(['auth'])->group(function () {
    Route::name('GUP.')->prefix('GUP')->group( function () {
        Route::resource('SpjBelanjaGup', SpjBelanjaGupController::class);
    });
});

Route::middleware(['auth'])->group(function () {
    Route::controller(RekapKinerjaUpkController::class)->group(function () {
        Route::get('/GUP/RekapKinerjaUpk', 'index')->name('Gup.RekapKinerjaUpk.index');
        Route::get('/GUP/RekapKinerjaUpk/{bulan}', 'lihatDetail')->name('Gup.RekapKinerjaUpk.detail');
        Route::get('/GUP/RekapKinerjaUpk/export/{bulan}', 'export')->name('Gup.RekapKinerjaUpk.export');
 
    });
});