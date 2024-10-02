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

  public function insertCities(): JsonResponse
  {
    $url = 'https://servicodados.ibge.gov.br/api/v1/localidades/municipios';
    $data = file_get_contents($url);
    $municipalities = json_decode($data, true);

    foreach ($municipalities as $municipality) {
      $exists = DB::table('cities')->where('id', $municipality['id'])->exists();

      if (!$exists) {
        DB::table('cities')->insert([
          'id' => $municipality['id'],
          'name' => $municipality['nome'],
          'state_id' => $municipality['microrregiao']['mesorregiao']['UF']['id']
        ]);
      }
    }

    return Response()->json('Inserido com sucesso');
  }
}
