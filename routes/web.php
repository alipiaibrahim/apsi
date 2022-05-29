<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KeloladosenController;
use App\Http\Controllers\KelolamahasiswaController;
use App\Http\Controllers\KelolauserController;
use App\Http\Controllers\KelolatopikController;
use App\Http\Controllers\KoordinatorController;
use App\Http\Controllers\DataproposalController;
use App\Http\Controllers\DospemController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\TopikController;
use App\Http\Controllers\DosenpebimbingController;
use App\Models\Dospem;

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
        return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('koordinator/home', [KoordinatorController::class, 'index'])
        ->name('koordinator.home');
    // ->middleware('is_admin');

Route::get('/prodi/keloladosen', [KeloladosenController::class, 'index'])->name('home');

    //route Keloladosen
Route::post('/prodi/keloladosen', [KeloladosenController::class, 'tambah_dosen'])
        ->name('admin.keloladosen.tambah')
        ->middleware('is_admin');
Route::patch('/prodi/keloladosen', [KeloladosenController::class, 'update_dosen'])
        ->name('admin.keloladosen.update')
        ->middleware('is_admin');
Route::get('/admin/ajaxadmin/datadosen/{id}', [KeloladosenController::class, 'getDataDosen']);
Route::delete('/prodi/keloladosen', [KeloladosenController::class, 'delete_dosen'])
        ->name('admin.keloladosen.delete')
        ->middleware('is_admin');

            //route Kelolamahasiswa
Route::get('/prodi/kelolamahasiswa', [KelolamahasiswaController::class, 'index'])->name('home');
Route::post('/prodi/kelolamahasiswa', [KelolamahasiswaController::class, 'tambah_mahasiswa'])
        ->name('admin.kelolamahasiswa.tambah')
        ->middleware('is_admin');
Route::patch('/prodi/kelolamahasiswa', [KelolamahasiswaController::class, 'update_mahasiswa'])
        ->name('admin.kelolamahasiswa.update')
        ->middleware('is_admin');
Route::get('/admin/ajaxadmin/datamahasiswa/{id}', [KelolamahasiswaController::class, 'getDataMahasiswa']);
Route::delete('/prodi/kelolamahasiswa', [KelolamahasiswaController::class, 'delete_mahasiswa'])
        ->name('admin.kelolamahasiswa.delete')
        ->middleware('is_admin');

    //route Kelolauser
Route::get('prodi/kelolauser', [KelolauserController::class, 'index'])
        ->name('user')
        ->middleware('is_admin');
Route::post('prodi/kelolauser', [KelolauserController::class, 'tambah_user'])
        ->name('admin.kelolauser.tambah')
        ->middleware('is_admin');
Route::patch('prodi/kelolauser', [KelolauserController::class, 'update_user'])
        ->name('admin.kelolauser.update')
        ->middleware('is_admin');
Route::get('admin/ajaxadmin/dataUser/{id}', [KelolauserController::class, 'getDataUser']);
Route::delete('prodi/kelolauser', [KelolauserController::class, 'delete_user'])
        ->name('admin.kelolauser.delete')
        ->middleware('is_admin');

            //route Kelolatopik
Route::get('koordinator/kelolatopik', [KelolatopikController::class, 'index'])->name('home');
Route::post('koordinator/kelolatopik', [KelolatopikController::class, 'tambah_topik'])
        ->name('koordinator.kelolatopik.tambah')
        ->middleware('is_koordinator');
Route::patch('koordinator/kelolatopik', [KelolatopikController::class, 'update_topik'])
        ->name('koordinator.kelolatopik.update')
        ->middleware('is_koordinator');
Route::get('admin/ajaxadmin/datatopik/{id}', [KelolatopikController::class, 'getDataTopik']);
Route::delete('koordinator.koordinator/kelolatopik', [KelolatopikController::class, 'delete_topik'])
        ->name('koordinator.kelolatopik.delete')
        ->middleware('is_koordinator');

        // route data proposal koordinator
Route::get('koordinator/proposal', [ProposalController::class, 'index'])->name('home')->middleware('is_koordinator');
Route::post('koordinator/proposal', [ProposalController::class, 'delete_dataproposal'])
        ->name('dataproposal.delete')
        ->middleware('is_koordinator');

//route dospem
Route::get('koordinator/dospem', [DospemController::class, 'index'])->name('home');
Route::post('koordinator/dospem', [DospemController::class, 'tambah_dospem'])
        ->name('koordinator.dospem.tambah')
        ->middleware('is_koordinator');
Route::delete('koordinator/dospem', [DospemController::class, 'delete_dospem'])
        ->name('koordinator.dospem.delete')
        ->middleware('is_koordinator');
Route::get('admin/ajaxadmin/datadospem/{id}', [DospemController::class, 'getDataDospem']);

// route proposal mhs
Route::get('mahasiswa/dataproposal', [DataproposalController::class, 'index'])->name('home');
Route::post('mahasiswa/dataproposal', [DataproposalController::class, 'tambah_dataproposal'])
                ->name('mahasiswa.dataproposal.tambah');
                // ->middleware('is_user');
Route::get('admin/ajaxadmin/datadataproposal/{id}', [DospemController::class, 'getDataDataproposal']);
Route::patch('mahasiswa/dataproposal', [DataproposalController::class, 'update_dataproposal'])
                ->name('mahasiswa.dataproposal.update');
                // ->middleware('is_user');

                // Topik MHS
Route::get('mahasiswa/topik', [TopikController::class, 'index'])->name('home');
Route::patch('mahasiswa/topik', [TopikController::class, 'update_topik'])
                ->name('mahasiswa.topik.update');
                // ->middleware('is_koordinator');
Route::get('admin/ajaxadmin/datatopik/{id}', [TopikController::class, 'getDataTopik']);

// route Dospem Dosen
Route::get('dosen/proposal', [DosenpebimbingController::class, 'index'])->name('home');