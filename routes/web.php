<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\groupActivityController;
use App\Http\Controllers\mainController;
use App\Http\Controllers\postController;
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

//Main
Route::get('/', [mainController::class, 'showMain']);
Route::get('/about', [mainController::class, 'showAboutUs']);

//Services
Route::get('/services', [serviceController::class, 'showServices']);
Route::get('/addService', [serviceController::class, 'viewCreate']);
Route::post('/addService', [serviceController::class, 'createService']);
Route::get('/viewService/{id}', [serviceController::class, 'viewService']);

//Group activities
Route::get('/groupActivities', [groupActivityController::class, 'viewActivities']);
Route::get('/viewGroupActivity/{id}', [groupActivityController::class, 'viewActivity']);
Route::get('/addActivity', [groupActivityController::class, 'viewCreate']);
Route::post('/addActivity', [groupActivityController::class, 'createActivity']);
Route::get('/registerActivity/{id}', [groupActivityController::class, 'viewRegister']);
Route::post('/registerActivity/{id}', [groupActivityController::class, 'createGroupMemeber']);

//Posts
Route::get('/posts', [postController::class, 'viewPosts']);
Route::get('/viewPost/{id}', [postController::class, 'viewPost']);

//Admin
Route::get('/admin', [adminController::class, 'showLogin']);
Route::get('/logout', [adminController::class, 'logout']);
Route::post('/admin', [adminController::class, 'signIn']);


