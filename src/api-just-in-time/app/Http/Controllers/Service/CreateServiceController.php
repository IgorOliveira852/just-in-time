<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class CreateServiceController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'preco' => 'required|numeric',
            'duracao' => 'required|integer',
            'descricao' => 'required|string',
            'status' => 'required|in:ativo,inativo',
            'company_id' => 'required|exists:companies,id'
        ]);

        $service = Service::create($request->all());

        return response()->json(['message' => 'Serviço criado com sucesso!', 'servico' => $service], 201);
    }
}
