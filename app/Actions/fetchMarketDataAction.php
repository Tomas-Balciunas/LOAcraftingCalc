<?php

namespace App\Actions;

use App\Recipes\Recipes;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class fetchMarketDataAction
{
    public function handleApi ($target)
    {
        $region = Cache::get('region');
        $data = Http::get('https://www.lostarkmarket.online/api/export-market-live/'. $region . $target);

        return json_decode($data, true);
    }
}
