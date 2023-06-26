<?php

namespace App\Actions;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class FetchMarketData
{
    public function handleApi ($ingredients, $category)
    {
        $region = Cache::get('region');
        $data = Http::get('https://www.lostarkmarket.online/api/export-market-live/'. $region . implode(',', [$ingredients, $category]));

        return json_decode($data, true);
    }
}
