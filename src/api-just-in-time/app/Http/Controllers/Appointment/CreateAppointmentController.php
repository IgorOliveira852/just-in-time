<?php

namespace App\Http\Controllers\Appointment;

use App\Enums\UserRoleEnum;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateAppointmentController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'started_at' => 'required|date_format:Y-m-d H:i',
            'service_id' => 'required|exists:services,id',
            'provider_id' => 'required|exists:users,id',
        ]);

        $provider = User::find($request->provider_id);
        if (!$provider || !$provider->isAdminOrAttendant()) {
            return response()->json(['message' => 'O provedor deve ser um funcionário da empresa.'], 403);
        }

        // TODO: ainda vou pensar sobre essa parte
        $client = Auth::user();
        if (!$client->isClient()) {
            return response()->json(['message' => 'Apenas clientes podem criar agendamentos.'], 403);
        }

        $service = Service::find($request->servico_id);
        $startedAt = Carbon::createFromFormat('Y-m-d H:i', $request->started_at);
        $endsAt = $startedAt->copy()->addMinutes($service->duracao);

        $appointment = new Appointment([
            'started_at' => $startedAt,
            'ends_at' => $endsAt,
            'service_id' => $request->servico_id,
            'status' => 'ativo',
            'company_id' => $service->company_id,
            'client_id' => $client->id,
            'provider_id' => $request->provider_id,
        ]);

        $appointment->save();

        return response()->json(['message' => 'Agendamento criado com sucesso!', 'appointment' => $appointment], 201);
    }
}
