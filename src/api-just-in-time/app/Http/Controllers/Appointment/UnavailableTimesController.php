<?php

namespace App\Http\Controllers\Appointment;

use App\Http\Controllers\Controller;
use App\Models\UnavailableTimes;
use Illuminate\Http\Request;

class UnavailableTimesController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'provider_id' => 'required|exists:users,id',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'date' => 'required|date_format:Y-m-d',
        ]);

        $unavailableTime = UnavailableTimes::create($request->all());

        return response()->json(['message' => 'Horário indisponível criado com sucesso!', 'unavailable_time' => $unavailableTime], 201);
    }
}
