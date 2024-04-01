<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ListCompanyServicesController extends Controller
{
    public function __invoke(Request $request, $companyId)
    {
        $services = Service::where('company_id', $companyId)->get();

        return response()->json(['services' => $services], 200);
    }
}
