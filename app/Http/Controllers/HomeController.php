<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;

class HomeController extends Controller
{
    public function home()
    {

        return view('blade.home');
    }

    public function region ($target): void
    {
        //Redis::set('region', $target);
        Cache::put('region', $target);
    }
}
