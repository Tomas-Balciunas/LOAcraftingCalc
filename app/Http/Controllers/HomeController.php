<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Actions\fetchMarketDataAction;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function home(fetchMarketDataAction $calcService)
    {

        return view('blade.home');
    }

//    public function item ($target, fetchMarketDataAction $fetchMarketDataAction)
//    {
//         return $fetchMarketDataAction->handle($target);
//    }

    public function region ($target)
    {
        //Redis::set('region', $target);
        Cache::delete('region');
        Cache::put('region', $target);
    }
}
