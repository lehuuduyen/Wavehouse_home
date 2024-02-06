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
    public function create_buy(Request $request){
        $data = $request->all();
        echo '<pre>';
        print_r($data);
        die;


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

        $gia_usd = $this->getGiaUsd();
        $max = 0;
        $max_vnd = 250000000;
        $max_usd = floor($max_vnd / $gia_usd);


        $price  = file_get_contents('https://api.binance.com/api/v3/ticker/price?symbol=FDUSDUSDT');
        if($price){
            $giaCoint = (int) json_decode($price)->price;


            $price = floor($giaCoint * $gia_usd);


            $max = $max_usd * $giaCoint;
            $priceSell = number_format($price - 200);
            $priceBuy = number_format($price + 200);
        }
        return view('page.buy', ['priceSell' => $priceSell,'priceBuy' => $priceBuy,'max' => $max]);
    }
    public function sell()
    {
        $priceSell = 0;
        $priceBuy = 0;
        $price  = file_get_contents('https://api.binance.com/api/v3/ticker/price?symbol=FDUSDUSDT');
        $gia_usd = $this->getGiaUsd();

        if($price){
            $price = floor(json_decode($price)->price *  $gia_usd);

            $priceSell = number_format($price - 200);
            $priceBuy = number_format($price + 200);
        }
        return view('page.sell', ['priceSell' => $priceSell,'priceBuy' => $priceBuy]);
    }
}
