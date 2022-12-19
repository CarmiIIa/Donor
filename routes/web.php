<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonorController;


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

// Route::get('/', function () {
//     return view('dashboard.create');
// });
// Route::get('/', function () {
//     return view('dashboard.index');
// });

Route::get('/login', [DonorController::class, 'login'])->name('login');
Route::get('/register', [DonorController::class, 'register'])->name('register');
Route::post('/register', [DonorController::class, 'inputRegister'])->name('register.post');
Route::post('/login', [DonorController::class, 'auth'])->name('login.auth');

Route::get('/logout', [DonorController::class, 'logout'])->name('logout');


Route::get('/', [DonorController::class, 'index'])->name('index');
Route::get('/create', [DonorController::class, 'create'])->name('create');
Route::post('/store', [DonorController::class, 'store'])->name('store');
Route::get('/edit/{id}', [DonorController::class, 'edit'])->name('edit');
Route::patch('/update/{id}', [DonorController::class, 'update'])->name('update');
Route::delete('/delete/{id}', [DonorController::class, 'destroy'])->name('delete');