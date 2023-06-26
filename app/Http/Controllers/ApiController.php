<?php

namespace App\Http\Controllers;

use App\Actions\FetchMarketData;
use App\Actions\PrepareData;
use App\Services\CraftingCalculationService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class ApiController extends Controller
{
    public function fetchRegion (): bool|string
    {
        //$region = Redis::get('region');
        $region = Cache::get('region');

        return json_encode($region);
    }

    public function fetchItems (PrepareData $prepare, $category): array
    {
        $region = Cache::get('region');
        return Cache::remember($region . $category, 7200, function () use ($prepare, $category) {
            $data = $prepare->handleData($category);
            $calc = new CraftingCalculationService($data, $category);
            return $calc->handleCalculation();
        });
    }
}
