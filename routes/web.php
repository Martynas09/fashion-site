<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\groupActivityController;
use App\Http\Controllers\mainController;
use App\Http\Controllers\postController;
use App\Http\Controllers\serviceController;
use App\Http\Middleware\AdminPermissions;
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
Route::get('/addService', [serviceController::class, 'viewCreate'])->middleware(AdminPermissions::class);;
Route::post('/addService', [serviceController::class, 'createService'])->middleware(AdminPermissions::class);;
Route::get('/viewService/{id}', [serviceController::class, 'viewService']);
Route::get('/editService/{id}', [serviceController::class, 'viewEdit'])->middleware(AdminPermissions::class);;
Route::post('/editService/{id}', [serviceController::class, 'editService'])->middleware(AdminPermissions::class);;
Route::get('/deleteService/{id}', [serviceController::class, 'deleteService'])->middleware(AdminPermissions::class);;
//purchase
Route::get('/purchaseService/{id}', [serviceController::class, 'viewPurchase']);
Route::post('/purchaseService/{id}', [serviceController::class, 'purchaseService']);

//Group activities
Route::get('/groupActivities', [groupActivityController::class, 'viewActivities']);
Route::get('/viewGroupActivity/{id}', [groupActivityController::class, 'viewActivity']);
Route::get('/addActivity', [groupActivityController::class, 'viewCreate'])->middleware(AdminPermissions::class);;
Route::post('/addActivity', [groupActivityController::class, 'createActivity'])->middleware(AdminPermissions::class);;
Route::get('/registerActivity/{id}', [groupActivityController::class, 'viewRegister']);
Route::post('/registerActivity/{id}', [groupActivityController::class, 'createGroupMemeber']);
Route::get('/editActivity/{id}', [groupActivityController::class, 'viewEdit'])->middleware(AdminPermissions::class);;
Route::post('/editActivity/{id}', [groupActivityController::class, 'editActivity'])->middleware(AdminPermissions::class);;
Route::get('/deleteActivity/{id}', [groupActivityController::class, 'deleteActivity'])->middleware(AdminPermissions::class);;

//Posts
Route::get('/posts', [postController::class, 'viewPosts']);
Route::get('/addPost', [postController::class, 'viewAddPost'])->middleware(AdminPermissions::class);;
Route::post('/addPost', [postController::class, 'addPost'])->middleware(AdminPermissions::class);;
Route::get('/editPost/{id}', [postController::class, 'viewEditPost'])->middleware(AdminPermissions::class);;
Route::post('/editPost/{id}', [postController::class, 'editPost'])->middleware(AdminPermissions::class);;
Route::get('/deletePost/{id}', [postController::class, 'deletePost'])->middleware(AdminPermissions::class);;

//Admin auth
Route::get('/admin', [adminController::class, 'showLogin']);
Route::get('/logout', [adminController::class, 'logout']);
Route::post('/admin', [adminController::class, 'signIn']);
//Groups
Route::get('/viewGroups', [adminController::class, 'viewGroups'])->middleware(AdminPermissions::class);;
Route::get('/notifyGroup/{id}', [adminController::class, 'viewNotify'])->middleware(AdminPermissions::class);;
Route::post('/notifyGroup/{id}', [adminController::class, 'sendNotify'])->middleware(AdminPermissions::class);;
Route::get('/clearGroup/{id}', [adminController::class, 'clearGroup'])->middleware(AdminPermissions::class);;
Route::get('/editMember/{id}', [adminController::class, 'viewEditMember'])->middleware(AdminPermissions::class);;
Route::post('/editMember/{id}', [adminController::class, 'editMember'])->middleware(AdminPermissions::class);;
Route::get('/deleteMember/{id}', [adminController::class, 'deleteMember'])->middleware(AdminPermissions::class);;
//Photos
Route::get('/deletePhoto/{id}', [adminController::class, 'deletePhoto'])->middleware(AdminPermissions::class);;

Route::fallback(function () {
    return redirect('/');
});
