<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }
    public function getGiaUsd(){
        $price  = file_get_contents('https://open.er-api.com/v6/latest/USD');
        $usd_to_vnd = 0;
        if($price){
            $data = json_decode($price, true);
            $usd_to_vnd = $data['rates']['VND'];

        }
        return $usd_to_vnd;
    }
    public function getGiaCoin($coin = 'FDUSDUSDT'){
        $price  = file_get_contents('https://api.binance.com/api/v3/ticker/price?symbol='.$coin);
        $usd_to_vnd = 0;
        if($price){
            $data = json_decode($price, true);
            $usd_to_vnd = $data['rates']['VND'];

        }
        return $usd_to_vnd;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function buy()
    {
        $priceSell = 0;
        $priceBuy = 0;
        $price  = file_get_contents('https://api.binance.com/api/v3/ticker/price?symbol=FDUSDUSDT');
        if($price){
            $price = floor(json_decode($price)->price * 24441);


            $priceSell = number_format($price - 200);
            $priceBuy = number_format($price + 200);
        }
        return view('page.buy', ['priceSell' => $priceSell,'priceBuy' => $priceBuy]);
    }
    public function sell()
    {
        $priceSell = 0;
        $priceBuy = 0;
        $price  = file_get_contents('https://api.binance.com/api/v3/ticker/price?symbol=FDUSDUSDT');
        if($price){
            $price = floor(json_decode($price)->price * 24441);

            $priceSell = number_format($price - 200);
            $priceBuy = number_format($price + 200);
        }
        return view('page.sell', ['priceSell' => $priceSell,'priceBuy' => $priceBuy]);
    }
}
