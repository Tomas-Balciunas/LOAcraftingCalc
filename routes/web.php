<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/{any}', function () {
    return view('blade.home');
})->where('any', '.*');

//Route::get('/', [HomeController::class, 'home']);
////Route::post('/item/{target}', [HomeController::class, 'item']);
Route::post('/region/{target}', [HomeController::class, 'region']);
