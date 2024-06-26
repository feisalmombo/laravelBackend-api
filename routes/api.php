<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// API routes
Route::get("list-students", [ApiController::class, "listStudents"]);

Route::get("single-student/{id}", [ApiController::class, "getSingleStudent"]);

Route::post("add-student", [ApiController::class, "CreateStudent"]);

Route::get("update-student/{id}/edit", [ApiController::class, "editStudent"]);

Route::put("update-student/{id}/edit", [ApiController::class, "updateStudent"]);

Route::delete("delete-student/{id}", [ApiController::class, "deleteStudent"]);
