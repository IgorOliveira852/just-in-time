<?php

namespace App\Http\Controllers\Appointment;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateAppointmentController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $request->validate([
            'started_at' => 'required|date_format:Y-m-d H:i',
            'service_id' => 'required|exists:services,id',
            'provider_id' => 'required|exists:users,id',
        ]);

        $appointment = Appointment::find($id);
        if (!$appointment || $appointment->client_id != Auth::id()) {
            return response()->json(['message' => 'Agendamento não encontrado ou você não tem permissão para editar este agendamento'], 404);
        }

        $newStartedAt = Carbon::createFromFormat('Y-m-d H:i', $request->started_at);
        if (Carbon::now()->addHour()->greaterThan($newStartedAt)) {
            return response()->json(['message' => 'Você só pode reagendar com pelo menos uma hora de antecedência.'], 400);
        }

        $appointment->update($request->all());

        return response()->json(['message' => 'Agendamento atualizado com sucesso!', 'appointment' => $appointment], 200);
    }
}
