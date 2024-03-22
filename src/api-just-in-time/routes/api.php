<?php

use App\Http\Controllers\Appointment\CreateAppointmentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Service\CreateServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('/login', [LoginController::class, 'submit']);
Route::post('/login/verify', [LoginController::class, 'verify']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('/agendamento', CreateAppointmentController::class);
});

Route::post('/servicos', CreateServiceController::class)->middleware('checkadmin');
