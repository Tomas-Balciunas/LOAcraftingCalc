<?php

namespace App\Actions;

use App\Actions\FetchMarketData;
use App\Models\Recipe;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;

class PrepareData
{
    public function handleData ($category): array
    {
        $ingredients = '?categories=Trader';
        $fetch = new FetchMarketData();
        $data = $fetch->handleApi($ingredients, $category);

        return Arr::mapWithKeys($data, function (array $item, string $key) {
            return array(
                $item['name'] => [
                    'price' => $item['lowPrice'],
                    'amount' => $item['amount']
                ]);
        });
    }

}
