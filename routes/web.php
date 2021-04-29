<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\WorkerControllers;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// authentication

Route::get('/', [WelcomeController::class, 'index']);
Route::get('/data-agenda', [WelcomeController::class, 'tampil']);
Route::get('/data-pegawai', [WelcomeController::class, 'show']);

Auth::routes();

// pegawai

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/pegawai',[WorkerControllers::class, 'index']);
Route::get('/create', [WorkerControllers::class, 'create']);
Route::post('/pegawai', [WorkerControllers::class, 'store']);
Route::get('/edit/{worker:id}', [WorkerControllers::class, 'edit']);
Route::put('/pegawai/update/{id}', [WorkerControllers::class, 'update']);
Route::get('/pegawai/hapus/{id}', [WorkerControllers::class, 'destroy']);
Route::get('/pegawai/export_excel', [WorkerControllers::class, 'export_excel']);
Route::post('/pegawai/import_excel', [WorkerControllers::class, 'import_excel']);

// agenda

Route::get('/dashboard', function() {
    return view('home');
});


Route::get('/agenda', [AgendaController::class, 'index']);
Route::get('/agenda/create', [AgendaController::class, 'create']);
Route::post('/agenda', [AgendaController::class, 'store']);
Route::get('/agenda/edit/{id}', [AgendaController::class, 'edit']);
Route::put('/agenda/update/{id}', [AgendaController::class, 'update']);
Route::get('/agenda/hapus/{id}', [AgendaController::class, 'destroy']);
Route::get('/agenda/cetak_pdf', [AgendaController::class, 'cetak_pdf']);

Route::get('/agenda/cari', [SearchController::class, 'cari']);