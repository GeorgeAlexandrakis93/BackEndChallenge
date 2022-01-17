<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\VoyageController;
use App\Http\Controllers\VesselController;
use App\Http\Controllers\Voyage_OpexController;

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

Route::get('vessels', [VesselController::class, 'index']);
Route::get('vessels/{id}', [VesselController::class, 'show']);

Route::get('voyages', [VoyageController::class, 'index']);
Route::get('voyages/{id}', [VoyageController::class, 'show']);
Route::post('voyages', [VoyageController::class, 'store']);
Route::put('voyages/{id}', [VoyageController::class, 'update']);
Route::delete('voyages/{id}', [VoyageController::class, 'delete']);

Route::post('vessels/{id}/voyage_opexes', [Voyage_OpexController::class, 'store']);
