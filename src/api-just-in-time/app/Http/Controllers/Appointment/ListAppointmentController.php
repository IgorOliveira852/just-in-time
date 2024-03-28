<?php

namespace App\Http\Controllers\Appointment;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListAppointmentController extends Controller
{
    public function __invoke()
    {
        $user = Auth::user();
        $appointments = Appointment::where('client_id', $user->id)->get();

        return response()->json(['appointments' => $appointments], 200);
    }
}
