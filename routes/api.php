<?php

use App\Http\Controllers\MapController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application.
|
*/

Route::get('/map-data', [MapController::class, 'getMapData']);
