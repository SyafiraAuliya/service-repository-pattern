<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\SiswaController;

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
Route::get('/', function () {
    return view('create');
});

Route::get('/table', function () {
    return view('table');
});

Route::get('/update', function () {
    return view('update');
});

Route::get('/hapus', function () {
    return view('hapus');
});

Route::post('/siswa/store', [SiswaController::class, 'store']); 
Route::get('/siswa/index', [SiswaController::class, 'index']); 
Route::get('/siswa/update{id}',[SiswaController::class,'show']);
Route::post('/siswa/edit{id}',[SiswaController::class,'update']);
Route::get('/siswa/delete{id}',[SiswaController::class,'destroy']);