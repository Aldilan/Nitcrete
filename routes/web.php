<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ControlwebController;
use App\Http\Controllers\ControlmessageController;
use App\Http\Controllers\ReplyController;



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

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/', [DashboardController::class, 'index'])->middleware('guest');
Route::get('/home', [DashboardController::class, 'indexa'])->middleware('auth');
Route::get('/home/{key}', [DashboardController::class, 'indexkey']);

Route::resource('webcontrol',ControlwebController::class)->middleware('admin');
Route::resource('messagecontrol',ControlmessageController::class)->middleware('admin');

Route::resource('reply', ReplyController::class);

Route::resource('account', AccountController::class)->middleware('auth');

Route::get('/sendmsg', [MessageController::class, 'index']);
Route::get('/sendmsg/{key}', [MessageController::class, 'direct']);
Route::post('/sendmsg', [MessageController::class, 'store']);
