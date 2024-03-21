<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\LoginNeedsVerification;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'phone' => 'required|numeric|min:9'
        ]);

        $user = User::firstOrCreate([
            'phone' => $request->phone
        ]);

        if (!$user){
            return response()->json(['message' => 'Não foi possível encontrar o usuario com o respectivo numero.'], 401);
        }

        $user->notify(new LoginNeedsVerification());

        return response()->json(['message' => 'menssagem de texto enviada.']);
    }

    public function verify(Request $request)
    {
        $request->validate([
            'phone' => 'required|numeric|min:9',
            'login_code' => 'required|numeric|between:111111,999999'
        ]);

        $user = User::where('phone', $request->phone)
            ->where('login_code', $request->login_code)
            ->first();
//        dd($request->phone);

        if ($user) {
            $user->update([
                'login_code' => null
            ]);

            return $user->createToken($request->login_code)->plainTextToken;
        }

        return response()->json(['message' => 'codigo de verificação invalido.'], 401);
    }
}
