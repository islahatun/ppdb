<?php

use App\Http\Controllers\blogController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\infoController;
use App\Http\Controllers\jurusanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\paramsController;
use App\Http\Controllers\sliderController;
use App\Http\Controllers\studentController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\UserControllers;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [homeController::class, 'index'])->name('home');
Route::get('/registration', [homeController::class, 'registration'])->name('registration');
Route::get('/login', [homeController::class, 'login'])->name('login');
Route::post('/save-regis', [homeController::class, 'store'])->name('registration.store');
Route::post('/login-data', [homeController::class, 'login_data'])->name('login_data');
Route::get('/getPendaftaran', [homeController::class, 'getData'])->name('getPendaftaran');
Route::get('/download-kartu/{id}', [homeController::class, 'downloadKartu'])->name('download-kartu');

Route::get('/form-pendaftaran', [homeController::class, 'form_pendaftaran'])->name('form_pendaftaran');
Route::post('/save-pendaftaran', [homeController::class, 'save_pendaftaran'])->name('save_pendaftaran');

Route::post('/logout',[homeController::class,'logout'])->name('logout');

// Route::redirect('/', '/dashboard');

// Dashboard
Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');

Route::get('/getDataStudent', [studentController::class, 'getData'])->name('getDataStudent');
Route::post('/updateStudent', [studentController::class, 'update'])->name('student.update');
Route::resource('student', studentController::class)->names([
    'index'   => 'student.index',
    'create'  => 'student.create',
    'store'   => 'student.store',
    'show'    => 'student.show',
    'edit'    => 'student.edit',
    'destroy' => 'student.destroy',
])->except('update');

Route::get('/getDataJurusan', [jurusanController::class, 'getData'])->name('getDataJurusan');
Route::post('/updateJurusan', [jurusanController::class, 'update'])->name('jurusan.update');
Route::resource('jurusan', jurusanController::class)->names([
    'index'   => 'jurusan.index',
    'create'  => 'jurusan.create',
    'store'   => 'jurusan.store',
    'show'    => 'jurusan.show',
    'edit'    => 'jurusan.edit',
    'destroy' => 'jurusan.destroy',
])->except('update');


Route::get('/getDataInfo', [infoController::class, 'getData'])->name('getDataInfo');
Route::post('/updateInfo', [infoController::class, 'update'])->name('info.update');
Route::resource('info', infoController::class)->names([
    'index'   => 'info.index',
    'create'  => 'info.create',
    'store'   => 'info.store',
    'show'    => 'info.show',
    'edit'    => 'info.edit',
    'destroy' => 'info.destroy',
])->except('update');

Route::get('/getDataParam', [paramsController::class, 'getData'])->name('getDataParam');
Route::post('/updateParam', [paramsController::class, 'update'])->name('params.update');
Route::resource('params', paramsController::class)->names([
    'index'   => 'params.index',
    'create'  => 'params.create',
    'store'   => 'params.store',
    'show'    => 'params.show',
    'edit'    => 'params.edit',
    'destroy' => 'params.destroy',
])->except('update');

Route::get('/getDataBlog', [blogController::class, 'getData'])->name('getDataBlog');
Route::post('/updateBlog', [blogController::class, 'update'])->name('blog.update');
Route::resource('blog', blogController::class)->names([
    'index'   => 'blog.index',
    'create'  => 'blog.create',
    'store'   => 'blog.store',
    'show'    => 'blog.show',
    'edit'    => 'blog.edit',
    'destroy' => 'blog.destroy',
])->except('update');

Route::get('/getDataSlider', [sliderController::class, 'getData'])->name('getDataSlider');
Route::post('/updateSlider', [sliderController::class, 'update'])->name('slider.update');
Route::resource('slider', sliderController::class)->names([
    'index'   => 'slider.index',
    'create'  => 'slider.create',
    'store'   => 'slider.store',
    'show'    => 'slider.show',
    'edit'    => 'slider.edit',
    'destroy' => 'slider.destroy',
])->except('update');

Route::get('/getDataAboute', [TentangController::class, 'getData'])->name('getDataAboute');
Route::post('/updateAboute', [TentangController::class, 'update'])->name('aboute.update');
Route::resource('aboute', TentangController::class)->names([
    'index'   => 'aboute.index',
    'create'  => 'aboute.create',
    'store'   => 'aboute.store',
    'show'    => 'aboute.show',
    'edit'    => 'aboute.edit',
    'destroy' => 'aboute.destroy',
])->except('update');


Route::get('/getDataUser', [UserControllers::class, 'getData'])->name('getDataUser');
Route::post('/updateUser', [UserControllers::class, 'update'])->name('user.update');
Route::resource('user', UserControllers::class)->names([
    'index'   => 'user.index',
    'create'  => 'user.create',
    'store'   => 'user.store',
    'show'    => 'user.show',
    'edit'    => 'user.edit',
    'destroy' => 'user.destroy',
])->except('update');

Route::get('/report_student', [LaporanController::class, 'laporanSiswa'])->name('laporan');
Route::get('/printStudent', [LaporanController::class, 'printSiswa'])->name('laporan.siswa');
Route::get('/printKeuangan', [LaporanController::class, 'printKeuangan'])->name('laporan.keuangan');
