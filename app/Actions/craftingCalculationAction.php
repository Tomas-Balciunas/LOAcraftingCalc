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
                    'price' => $item['recentPrice'],
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

        print_r($result);
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
            $result['recipe'][$key] = bcmul($units, $pricePerUnit, 2);
            $result['totalCost'] = bcadd($result['totalCost'], $result['recipe'][$key], 2);
        }

        $result['marketValue'] = bcmul($battleItems[$name], $item['amount'], 2);

        return $result;
    }
}
