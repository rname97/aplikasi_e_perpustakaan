<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\HomeAdminController;
use App\Http\Controllers\Admin\DashboardAdminController;

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

// Route::get('/', function () {
//     return view('admin.layouts.master');
// });
Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/admin/login',[LoginController::class,'showAdminLoginForm'])->name('admin.login-view');
Route::post('/admin/login',[LoginController::class,'adminLogin'])->name('admin.login');

Route::get('/admin/register',[RegisterController::class,'showAdminRegisterForm'])->name('admin.register-view');
Route::post('/admin/register',[RegisterController::class,'createAdmin'])->name('admin.register');


Route::group(['middleware' => ['auth:admin']], function() {
    Route::get('/admin/dashboard/', [DashboardAdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/kategori', [KategoriController::class, 'show']);
    Route::get('/kategori_form_add', [KategoriController::class, 'viewAddKategori'])->name('kategori_form_add');
    Route::post('/submitAddKategori', [KategoriController::class, 'addKategori'])->name('submitAddKategori');
    Route::get('/kategori_form_edit/{id}', [KategoriController::class, 'viewEditKategori']);
    Route::post('/submitEditKategori/{id}', [KategoriController::class, 'editKategori']);
    Route::get('/deleteKategori/{id}', [KategoriController::class, 'deleteKategori']);



    Route::get('/books', [BooksController::class, 'show']);
    Route::get('/books_form_add', [BooksController::class, 'viewAddBooks'])->name('books_form_add');
    Route::post('/submitAddBooks', [BooksController::class, 'addBooks'])->name('submitAddBooks');
    Route::get('/books_form_edit/{id}', [BooksController::class, 'viewEditBooks']);
    Route::post('/submitEditBooks/{id}', [BooksController::class, 'editBooks']);
    Route::get('/deleteBooks/{id}', [BooksController::class, 'deleteBooks']);


    Route::get('/peminjaman', [PeminjamanController::class, 'show']);
    Route::get('/peminjaman_books_form_add/{id}', [PeminjamanController::class, 'viewAddPeminjaman']);
    Route::post('/submitAddPeminjaman', [PeminjamanController::class, 'addPeminjaman'])->name('submitAddPeminjaman');
});









// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





// Route::group(['middleware' => ['auth:admin']], function() {
//     Route::get('/admin/dashboard', [HomeAdminController::class, 'index'])->middleware('auth:admin');
//     // Route::get('/test',[TestController::class,'index'])->name('test');
// });


// Route::group(['middleware' => ['auth:web']], function() {
//     Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth:web');
// });
