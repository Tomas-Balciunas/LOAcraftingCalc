<?php

namespace App\Http\Controllers;

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

    public function fetchItems (Recipes $recipes): array
    {
        $list = [];
        $data = $recipes->allRecipes();
        $list = array_keys($data);

        return $list;
    }
}
