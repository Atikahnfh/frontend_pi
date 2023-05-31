<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\BeasiswaController;


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
//     return view('welcome');
// });
Route::get('/cek-eligible', function () {
    return view('cek-eligible');
});
Route::get('/daftar-beasiswa', function () {
    return view('daftar-beasiswa');
});

Route::get('/beasiswa', [BeasiswaController::class, 'read_beasiswa']);
