<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\BaseController;
use App\Models\History;

class HomeController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function index()
    {
        $priceSell = 0;
        $priceBuy = 0;

        $gia_usd = $this->getGiaUsd();

        $price  = file_get_contents('https://api.binance.com/api/v3/ticker/price?symbol=FDUSDUSDT');

        if ($price) {
            $giaCoint =  json_decode($price)->price;
            $price = floor($giaCoint * $gia_usd);
            $priceSell = number_format($this->calPriceSell($price));

            $priceBuy = number_format($this->calPriceBuy($price));
        }
        return view('page.home', ['priceSell' => $priceSell, 'priceBuy' => $priceBuy]);
    }
    public function getGiaUsd()
    {
        $price  = file_get_contents('https://open.er-api.com/v6/latest/USD');
        $usd_to_vnd = 0;
        if ($price) {
            $data = json_decode($price, true);
            $usd_to_vnd = $data['rates']['VND'];
        }
        return $usd_to_vnd;
    }
    public function getGiaCoin($coin = 'FDUSDUSDT')
    {
        $price  = file_get_contents('https://api.binance.com/api/v3/ticker/price?symbol=' . $coin);
        $usd_to_vnd = 0;
        if ($price) {
            $data = json_decode($price, true);
            $usd_to_vnd = $data['rates']['VND'];
        }
        return $usd_to_vnd;
    }
    public function create_buy(Request $request)
    {

        try {
            $data = $request->all();

            $rules = array(
                'sdt' => 'required|string|max:255',
            );
            $messages = array(
                'sdt.required' => 'Số điện thoại khách hàng không được để trống',
            );
            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return  $this->responseError($validator->errors()->first());
            }
            $data = $request->all();

            $gia_usd = $this->getGiaUsd();
            $max_usd = $this->getMaxUsd($gia_usd);
            $price  = file_get_contents('https://api.binance.com/api/v3/ticker/price?symbol=FDUSDUSDT');

            if ($price) {
                $giaCoint =  json_decode($price)->price;
                $price = floor($giaCoint * $gia_usd);
                $max = $max_usd * $giaCoint;
                settype($data['amount'], 'float');
                if ($data['amount'] < $max) {
                    //false
                    $priceBuy =  (int) $this->calPriceBuy($price);

                    $data['price'] = $priceBuy;

                    $data['total'] = $priceBuy * ($data['amount'] + $data['fee']);



                    $result = History::create($data);


                    return redirect()->back()->with('result', $result);
                } else {

                    return redirect()->back()->withErrors("Giá không được vướt quá " . $max)->withInput();
                }
            }
        } catch (\Throwable $th) {

            return redirect()->back()->withErrors($th->getMessage())->withInput();

            //throw $th;
        }
    }

    public function create_sell(Request $request)
    {

        try {
            $data = $request->all();

            $rules = array(
                'sdt' => 'required|string|max:255',
            );
            $messages = array(
                'sdt.required' => 'Số điện thoại khách hàng không được để trống',
            );
            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return  $this->responseError($validator->errors()->first());
            }
            $data = $request->all();

            $gia_usd = $this->getGiaUsd();
            $price  = file_get_contents('https://api.binance.com/api/v3/ticker/price?symbol=FDUSDUSDT');

            if ($price) {
                $giaCoint =  json_decode($price)->price;
                $price = floor($giaCoint * $gia_usd);
                settype($data['amount'], 'float');
                //false
                $priceSell =  (int) $this->calPriceSell($price);

                $data['price'] = $priceSell;
                $data['status'] = 2;

                $data['total'] = $priceSell * ($data['amount'] + $data['fee']);



                $result = History::create($data);


                return redirect()->back()->with('result', $result);
            }
        } catch (\Throwable $th) {

            return redirect()->back()->withErrors($th->getMessage())->withInput();

            //throw $th;
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function calPriceBuy($price)
    {
        $priceSell =  (float)  $price + 200;
        return $priceSell;
    }
    public function calPriceSell($price)
    {
        $priceSell =  (float)  $price - 200;
        return $priceSell;
    }
    public function getMaxUsd($gia_usd)
    {
        $max_vnd = 250000000;
        $max_usd = floor($max_vnd / $gia_usd);


        return $max_usd;
    }
    public function buy()
    {
        $priceSell = 0;
        $priceBuy = 0;

        $gia_usd = $this->getGiaUsd();

        $max = 0;

        $max_usd = $this->getMaxUsd($gia_usd);

        $price  = file_get_contents('https://api.binance.com/api/v3/ticker/price?symbol=FDUSDUSDT');

        if ($price) {
            $giaCoint =  json_decode($price)->price;
            $price = floor($giaCoint * $gia_usd);
            $max = $max_usd * $giaCoint;
            $priceSell = number_format($this->calPriceSell($price));

            $priceBuy = number_format($this->calPriceBuy($price));
        }

        return view('page.buy', ['priceSell' => $priceSell, 'priceBuy' => $priceBuy, 'max' => $max]);
    }
    public function sell()
    {
        $priceSell = 0;
        $priceBuy = 0;
        $price  = file_get_contents('https://api.binance.com/api/v3/ticker/price?symbol=FDUSDUSDT');
        $gia_usd = $this->getGiaUsd();

        if ($price) {
            $price = floor(json_decode($price)->price *  $gia_usd);

            $priceSell = number_format($this->calPriceSell($price));

            $priceBuy = number_format($this->calPriceBuy($price));
        }
        return view('page.sell', ['priceSell' => $priceSell, 'priceBuy' => $priceBuy]);
    }
}
