<?php

use App\Http\Controllers\photoController;
use App\Http\Controllers\serviceController;
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

Route::get('/', function () {
    return view('main');
});
Route::get('/services', [serviceController::class, 'showServices']);
Route::get('/upload', [photoController::class, 'create']);
Route::post('/upload', [photoController::class, 'store']);
Route::get('/viewService/{id}', [serviceController::class, 'viewService']);

