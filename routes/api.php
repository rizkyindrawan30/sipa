<?php

use App\Http\Controllers\API\AbsensiController;
use App\Http\Controllers\API\JadwalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('Absensi', [AbsensiController::class, 'dataAbsen']);
Route::resource('Jadwal', JadwalController::class);
Route::post('Jadwal/{id_kegiatan}', [JadwalController::class, 'update']);
