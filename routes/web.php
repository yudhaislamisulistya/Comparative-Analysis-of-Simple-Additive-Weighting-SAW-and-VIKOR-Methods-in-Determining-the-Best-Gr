<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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
    return view('welcome');
});

Route::post('/login', function (Request $request) {
    $email = $request->email;
    $password = $request->password;
    if($email == "admin@gmail.com" && $password == "12345678"){
        return redirect()->to('/admin/dashboard');
    }else{
        return redirect()->back()->with('status', 'gagal');
    }
})->name('postLogin');
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [MainController::class, 'dashboard'])->name('getDashboard');

    Route::get('/kriteria', [MainController::class, 'kriteria'])->name('getKriteria');
    Route::post('/kriteria', [MainController::class, 'kriteria_store'])->name('postKriteria');
    Route::get('/kriteria/{code}', [MainController::class, 'kriteria_delete'])->name('deleteKriteria');

    Route::get('/sub-kriteria', [MainController::class, 'sub_kriteria'])->name('getSubKriteria');
    Route::post('/sub-kriteria', [MainController::class, 'sub_kriteria_store'])->name('postSubKriteria');
    Route::get('/sub-kriteria/{code}', [MainController::class, 'sub_kriteria_delete'])->name('deleteSubKriteria');

    Route::get('/sub-kriteria', [MainController::class, 'sub_kriteria'])->name('getSubKriteria');
    Route::post('/sub-kriteria', [MainController::class, 'sub_kriteria_store'])->name('postSubKriteria');
    Route::get('/sub-kriteria/{id}', [MainController::class, 'sub_kriteria_delete'])->name('deleteSubKriteria');

    Route::get('/alternatif', [MainController::class, 'alternatif'])->name('getAlternatif');
    Route::post('/alternatif', [MainController::class, 'alternatif_store'])->name('postAlternatif');
    Route::get('/alternatif/{code}', [MainController::class, 'alternatif_delete'])->name('deleteAlternatif');

    Route::post('/alternatif-kriteria', [MainController::class, 'alternatif_kriteria_store'])->name('postAlternatifKriteria');
    Route::get('/alternatif-kriteria/{code}', [MainController::class, 'alternatif_kriteria_delete'])->name('deleteAlternatifKriteria');

    Route::get('/metode-saw', [MainController::class, 'metode_saw'])->name('getMetodeSaw');
    Route::get('/metode-saw/tabel-normalisasi', [MainController::class, 'metode_saw_tabel_normalisasi'])->name('getMetodeSawTabelNormalisasi');
    Route::get('/metode-saw/tabel-perangkingan', [MainController::class, 'metode_saw_tabel_perangkingan'])->name('getMetodeSawTabelPerangkingan');

    Route::get('/vikor', [MainController::class, 'metode_vikor'])->name('getMetodeVikor');
    Route::get('/vikor/tabel-normalisasi', [MainController::class, 'metode_vikor_tabel_normalisasi'])->name('getMetodeVikorTabelNormalisasi');
    Route::get('/vikor/tabel-ummiv-rangking', [MainController::class, 'metode_vikor_tabel_ummiv_rangking'])->name('getMetodeVikorTabelUMMIVRangking');

    Route::get('/hasil', [MainController::class, 'hasil'])->name('getHasil');

});
