<?php

use App\Http\Controllers\ContactController;
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

Route::get('/', [ContactController::class, 'index'])->name('contact_index');
Route::get('/add', [ContactController::class, 'create'])->name('contact_add');
Route::get('/show', [ContactController::class, 'show'])->name('contact_show');
Route::post('/destroy/{id}', [ContactController::class, 'destroy'])->name('contact_destroy');
Route::post('/store', [ContactController::class, 'store'])->name('contact_store');
Route::get('/edit/{id}', [ContactController::class, 'edit'])->name('contact_edit');
Route::post('/update/{id}', [ContactController::class, 'update'])->name('contact_update');
// Route::get('/', [ContactController::class, 'index'])->name('contact_index');
