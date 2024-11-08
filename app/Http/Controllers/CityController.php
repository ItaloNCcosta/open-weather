<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{
  public function searchCities(Request $request): JsonResponse
  {
    $search = $request->get('search');

    $cities = Cities::where('name', 'like', '%' . $search . '%')
      ->limit(3)
      ->get();

    return response()->json($cities);
  }
}
