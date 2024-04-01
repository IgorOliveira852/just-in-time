<?php

use App\Http\Controllers\Appointment\CreateAppointmentController;
use App\Http\Controllers\Appointment\ListAppointmentController;
use App\Http\Controllers\Appointment\UnavailableTimesController;
use App\Http\Controllers\Appointment\UpdateAppointmentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Service\CreateServiceController;
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

// rotas de login
Route::post('/login', [LoginController::class, 'submit']);
Route::post('/login/verify', [LoginController::class, 'verify']);

// rotas do usuario cliente
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('agendamentos', ListAppointmentController::class); // rota para listar um agendamento
    Route::post('criar-agendamento', CreateAppointmentController::class); // rota para criar um agendamento
    Route::put('agendamentos/{id}', UpdateAppointmentController::class); // rota de editar de agendamento

});

Route::post('/servicos', CreateServiceController::class)->middleware('checkadmin');
Route::post('/horarios-indisponiveis', UnavailableTimesController::class)->middleware('checkadmin');
