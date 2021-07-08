<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
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

Route::get('/',[StudentController::class,'index']);
Route::get('/tambah_siswa',[StudentController::class,'create']);
Route::post('/tambah_siswa',[StudentController::class,'store']);
Route::get('/detail_siswa/{student}',[StudentController::class,'show']);
Route::delete('/detail_siswa/{student}',[StudentController::class,'destroy']);
Route::get('/edit_siswa/{student}',[StudentController::class,'edit']);
Route::patch('/edit_siswa/{student}',[StudentController::class,'update']);
Route::get('/search',[StudentController::class,'search']);
