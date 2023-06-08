<?php

namespace App\Actions;

use App\Recipes\Recipes;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class calcService
{
    public function handle ($target)
    {
        $region = Cache::get('region');
//        $response = Http::get('https://www.lostarkmarket.online/api/export-market-live/'. $region .'?categories=Trader');
//        $data = json_decode($response);

        $getRecipe = new Recipes();
        $item = $getRecipe->recipe($target);

        return $item;
    }
}
