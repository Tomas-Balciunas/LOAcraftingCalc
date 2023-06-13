<?php

namespace App\Actions;

use Illuminate\Support\Arr;

class craftingCalculationAction
{
    public function handleCalculation($market, $recipes): array
    {
        $result = [];

        $ingredients = Arr::mapWithKeys($market['ingredients'], function (array $item, string $key) {
            return array(
                $item['name'] => [
                    'price' => $item['lowPrice'],
                    'amount' => $item['amount']
                ]);
        });

        $battleItems = Arr::mapWithKeys($market['battleItems'], function (array $item, string $key) {
            return [$item['name'] => $item['recentPrice']];
        });

        foreach ($recipes as $key => $item)
        {
            $result[$key] = $this->calculate($ingredients, $item, $battleItems, $key);
        }

        return $result;
    }

    private function calculate ($ingredients, $item, $battleItems, $name): array
    {
        $result = $item;
        $result['totalCost'] = $item['cost'];

        foreach ($item['recipe'] as $key => $units)
        {
            $ingredient = $ingredients[$key];
            $pricePerUnit = bcdiv($ingredient['price'], $ingredient['amount'], 2);
            $result['recipe'][$key] = round(bcmul($units, $pricePerUnit, 2));
            $result['totalCost'] = round($result['totalCost'] + $result['recipe'][$key]);
        }

        $result['marketValue'] = bcmul($battleItems[$name], $item['amount']);

        return $result;
    }
}
