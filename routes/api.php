<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserTypeController;
use App\Http\Controllers\API\SectionTypeController;
use App\Http\Controllers\API\TermsConditionController;

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


//Route::middleware('auth:api')->group( function () {

Route::get('user-type', [UserTypeController::class, 'getAll']);
Route::get('sec-type', [SectionTypeController::class, 'getAll']);
Route::get('terms', [TermsConditionController::class, 'getAll']);
Route::get('terms/{terms_id}', [TermsConditionController::class, 'GetTerm']);
Route::post('terms', [TermsConditionController::class, 'createTerm']);
Route::post('terms/edit', [TermsConditionController::class, 'updateTerm']);
Route::post('terms/delete', [TermsConditionController::class, 'deleteTerm']);

//});


