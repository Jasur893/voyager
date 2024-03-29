<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SendContactController;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;

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

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::post('/sendcontact', [SendContactController::class, 'sendcontact'])->name('sendcontact');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
