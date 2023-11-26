<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Project;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\API\TypeController;
use App\Http\Controllers\API\TechnologyController;
use App\Models\Technology;
use App\Models\Type;
use App\Http\Controllers\Mail\LeadController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/projects', [ProjectController::class, 'projects']);
Route::get('/projects/latest', [ProjectController::class, 'latest_projects']);
Route::get('/projects/{project:slug}', [ProjectController::class, 'single_project']);
Route::get('/types', [TypeController::class, 'types']);
Route::get('/technologies', [TechnologyController::class, 'technologies']);
Route::post('/lead', [LeadController::class, 'store']);
