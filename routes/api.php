<?php

use App\Http\Controllers\Api\ProjectCategoryController;
use App\Http\Controllers\Api\SearchApiController;
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

Route::apiResource('project-categories', ProjectCategoryController::class);

Route::get('searchprojectcategories/{search}', [SearchApiController::class, 'projectcategories']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
