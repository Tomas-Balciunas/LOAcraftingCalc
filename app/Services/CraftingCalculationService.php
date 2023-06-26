<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Arr;
use App\Models\Recipe;

class CraftingCalculationService
{
    private array $data;
    private string $category;
    private $recipes;

    public function __construct ($data, $category)
    {
        $this->data = $data;
        $this->category = $category;
        $this->recipes = Category::where('category', $this->category)->first()->recipes;
    }

    public function handleCalculation(): array
    {
        $result = [];

        foreach ($this->recipes as $recipe)
        {
            if (!$recipe->is_splendid) {
                $result[$recipe->name] = $this->calculate($recipe);
            } else {
                $result[$recipe->name] = $this->splendid($recipe);
            }

        }

        return $result;
    }

    private function calculate ($recipe): array
    {
        $item = $recipe->toArray();
        $item['ingredients'] = json_decode($recipe->ingredients, true);

        $marketItem = $this->data[$recipe->name];
        $cost = $recipe->cost;
        $amount = $recipe->amount;

        $ingredientsCalculated = $this->ingredients($item['ingredients']);
        $marketValue = bcmul($marketItem['price'], $amount);
        $totalCost = round(bcadd(array_sum($ingredientsCalculated), $cost, 2));
        $comparison = $this->comparison($totalCost, $marketValue);

        $item['comparison'] = $comparison;
        $item['totalCost'] = $totalCost;
        $item['marketValue'] = $marketValue;
        $item['ingredients_calculated'] = $ingredientsCalculated;

        return $item;
    }

    private function ingredients ($ingredients): array
    {
        $result = [];

        foreach ($ingredients as $key => $units)
        {
            $i = $this->data[$key];
            $pricePerUnit = bcdiv($i['price'], $i['amount'], 2);
            $ingredientCost = round(bcmul($units, $pricePerUnit, 2));
            $result[$key] = $ingredientCost;
        }

        return $result;
    }

    private function splendid ($recipe): array
    {
        $baseCalc = $this->calculate($recipe);
        $splendidIngredient = $this->recipes->keyBy('name')->get($recipe->splendid_ingredient);
        $baseCalc['splendid_ingredient'] = $this->calculate($splendidIngredient);

        $totalCostCrafting = bcadd($baseCalc['totalCost'], $baseCalc['splendid_ingredient']['totalCost']);
        $totalCostNoCrafting = bcadd($baseCalc['totalCost'], $baseCalc['splendid_ingredient']['marketValue']);
        $comparisonCraft = $this->comparison($totalCostCrafting, $baseCalc['marketValue']);
        $comparisonBuy = $this->comparison($totalCostNoCrafting, $baseCalc['marketValue']);

        $baseCalc['comparison'] = $comparisonCraft;
        $baseCalc['comparisonBuy'] = $comparisonBuy;
        $baseCalc['totalCost'] = $totalCostCrafting;
        $baseCalc['totalCostNoCrafting'] = $totalCostNoCrafting;

        return $baseCalc;
    }

    private function comparison ($total, $market): float
    {
        //return (bcsub(bcdiv(bcmul(100, $total), $market, 2), 100, 2));
        return round(((100 * $total) / $market - 100), 2);
    }
}
