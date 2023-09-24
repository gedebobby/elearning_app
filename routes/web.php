<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\MapelController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Guru\DashboardControllerGuru;
use App\Http\Controllers\Guru\MateriController;
use App\Http\Controllers\Guru\TugasController;
use App\Http\Controllers\Guru\UjianController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Siswa\DashboardController as SiswaDashboardController;

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


Route::middleware(['isLogin'])->group(function () {   
    // Route::get('home', 'HomeController@index');
    
    Route::resource('profile', ProfileController::class);
    Route::post('/changePassword', [ProfileController::class, 'changePassword']);
    
    Route::middleware(['isAdmin'])->group(function(){
        
        // Admin 
        // Route::post('/changePassword', [ProfileController::class, 'changePassword']);
        Route::resource('siswa', SiswaController::class);
        Route::resource('kelas', KelasController::class);
        Route::resource('mapel', MapelController::class);
        Route::resource('guru', GuruController::class);
        Route::get('/guru/set-mapel/{id}', [GuruController::class, 'showSetGuruMapel']);
        Route::post('/guru/set-mapel-guru', [GuruController::class, 'storeGuruMapel']);
        Route::get('/dashboard', [AdminController::class, 'index']);
        Route::get('/admin', [AdminController::class, 'index']);
        // Admin & Guru
       //  Route::resource('materi', MateriController::class);
       //  Route::resource('tugas', TugasController::class);
       //  -ujian
    });

    Route::middleware(['isGuru'])->group(function () {
        Route::get('/dashboardguru', [DashboardControllerGuru::class, 'index']);
        Route::get('/dashboard-detail', [DashboardControllerGuru::class, 'dashboardDetail']);
        Route::get('/kelas-detail', [DashboardControllerGuru::class, 'kelasDetail']);
        Route::get('/listsiswa/{idkelas}', [DashboardControllerGuru::class, 'dataSiswa']);
        Route::resource('materi', MateriController::class);
        Route::resource('tugas', TugasController::class);
        Route::resource('ujian', UjianController::class);

        // Tugas
        Route::get('/tugas/list/{idtugas}/{idkelas}', [TugasController::class, 'list']);
        Route::post('/tugas/nilaitugas', [TugasController::class, 'nilaiTugas']);


        // Route::post('changePassword/{$iduser}', [ProfileController::class, 'changePassword']);
        
        // -ujian
        Route::get('/ujian/soal/{idujian}', [UjianController::class, 'soal']);
        Route::get('/ujian/hasil/{idujian}/{idkelas}', [UjianController::class, 'hasilUjian']);
        Route::post('/ujian/addsoal', [UjianController::class, 'addSoal']);
        Route::get('/ujian/editSoal/{idsoal}', [UjianController::class, 'viewUpdateSoal']);
        Route::post('/ujian/updateSoal/{idsoal}', [UjianController::class, 'updateSoal']);
        Route::delete('/ujian/deleteSoal/{idsoal}', [UjianController::class, 'deleteSoal']);
    });

    Route::middleware(['isStudent'])->group(function() {
        Route::get('/student', [SiswaDashboardController::class, 'index']);
        Route::get('/student/materi', [SiswaDashboardController::class, 'showMapel']);
        Route::get('/student/materi/{id}', [SiswaDashboardController::class, 'showMateri']);
        Route::get('/student/tugas', [SiswaDashboardController::class, 'showTugas']);
        Route::get('/student/ujian', [SiswaDashboardController::class, 'showUjian']);
        Route::post('/student/tugas', [SiswaDashboardController::class, 'storeTugas']);
        Route::get('/student/ujian/{idujian}', [SiswaDashboardController::class, 'showSoal']);
        Route::post('/student/ujian/{idujian}', [SiswaDashboardController::class, 'storeUjian']);
        Route::get('/student/tugas/{id}', [SiswaDashboardController::class, 'showDetailTugas']);
        Route::get('/student/hasil', [SiswaDashboardController::class, 'hasilUjian']);
    });
    
    Route::post('/changePassword', [ProfileController::class, 'changePassword']);
    Route::group(['middleware' => 'isAssigned'], function () {
        Route::get('/student/ujian/{idujian}', [SiswaDashboardController::class, 'showSoal']);
    });

     
});


Route::group(['middleware' => 'alreadyLogin'], function () {
    Route::get('/', [AuthController::class, 'login']);
    Route::get('/login', [AuthController::class, 'login']);
});

Route::get('/logout', [AuthController::class, 'logout']);
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/materi/download/{file}', [MateriController::class, 'download']);
Route::get('/tugas/download/{file}', [TugasController::class, 'download']);


Route::prefix('/')->group(function () {
    // Admin

    // Siswaaa
    
    
    // Tugass
    // Route::get('/tugas', [TugasController::class, 'index']);
    
    // Route::get('/kelas', [KelasController::class, 'index']);
    // Route::get('/siswa', [SiswaController::class, 'index']);
    // Route::get('/guru', [GuruController::class, 'index']);
    // Route::get('/mapel', [MapelController::class, 'index']);
    
    // Route::get('/guruDashboard', [DashboardController::class, 'index']);
    // Route::get('/materi', [MateriController::class, 'index']);
    // Route::get('/materi/detail-materi/{id}', [MateriController::class, 'showMateri']);
    // Route::get('/tugas', [TugasController::class, 'index']);
});





