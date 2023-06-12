<?php

namespace App\Http\Controllers;

use App\Actions\craftingCalculationAction;
use App\Actions\fetchMarketDataAction;
use App\Http\Controllers\Controller;
use App\Recipes\Recipes;
use Illuminate\Http\Request;
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

    public function fetchItems (Recipes $recipes, fetchMarketDataAction $fetchMarket, craftingCalculationAction $craftingCalc): array
    {
        $targetIngredients = '?categories=Trader';
        $targetBattleItems = '?categories=Combat%20Supplies';
        $itemList = $recipes->allRecipes();

        if (Cache::has('data1')) {
            $marketData = Cache::get('data');
        } else {
            $ingredients = $fetchMarket->handleApi($targetIngredients);
            $battleItems = $fetchMarket->handleApi($targetBattleItems);
            $marketData = [
                'ingredients' => $ingredients,
                'battleItems' => $battleItems
            ];

            Cache::put('data', $marketData);
        }

        return $craftingCalc->handleCalculation($marketData, $itemList);
    }
}
