<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\BaseController;
use App\Models\History;
use DateTime;

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
    function formatDate($date)
    {
        // Create DateTime objects for the given date and current date
        $date = new DateTime($date);
        $now = new DateTime();

        // Calculate the difference between the dates
        $diff = $now->diff($date);

        // Format the output based on the difference
        if ($diff->y > 0) {
            return $diff->y . " năm trước";
        } elseif ($diff->m > 0) {
            return $diff->m . " tháng trước";
        } elseif ($diff->d > 0) {
            return $diff->d . " ngày trước";
        } elseif ($diff->h > 0) {
            return $diff->h . " giờ trước";
        } elseif ($diff->i > 0) {
            return $diff->i . " phút trước";
        } else {
            return "Vừa xong";
        }
    }
    public function index()
    {
        $priceSell = 0;
        $priceBuy = 0;

        $gia_usd = $this->getGiaUsd();

        $price  = file_get_contents('https://api.binance.com/api/v3/ticker/price?symbol=FDUSDUSDT');
        $history = History::where('status_process', 2)->orderBy('created_at', 'DESC')->limit(12)->get();
        foreach ($history as $key => $val) {
            $history[$key]['time'] = $this->formatDate($val['created_at']);
        }
        if ($price) {
            $giaCoint =  json_decode($price)->price;
            $price = floor($giaCoint * $gia_usd);
            $priceSell = number_format($this->calPriceSell($price));

            $priceBuy = number_format($this->calPriceBuy($price));
        }
        return view('page.home', ['priceSell' => $priceSell, 'priceBuy' => $priceBuy, 'history' => $history]);
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
            $price  = file_get_contents('https://www.kucoin.com/_api/otc/ad/list?status=PUTUP&currency=USDT&legal=VND&page=1&pageSize=1&side=SELL&amount=&payTypeCodes=&c=599a192864b44432897171ea659df91b&lang=vi_VN');

            if ($price) {
                $price = json_decode($price);
                $price = $price->items[0]->premium;
                $max = $max_usd * $price;
                settype($data['amount'], 'float');
                if ($data['amount'] < $max) {
                    //false
                    $priceBuy =  (int) $this->calPriceBuy($price);

                    $data['price'] = $priceBuy;
                    $data['code'] = $this->generateRandomString(15);

                    $data['total'] = $priceBuy * ($data['amount'] + $data['fee']);



                    $result = History::create($data);


                    return redirect();
                } else {

                    return redirect()->back()->withErrors("Giá không được vướt quá " . $max)->withInput();
                }
            }
        } catch (\Throwable $th) {

            return redirect()->back()->withErrors($th->getMessage())->withInput();

            //throw $th;
        }
    }
    public function Diachivi($addr)
    {
        $address = [
            'TRC20' => '129210983921890281098321021',
            'BEP20 ' => '129210983921890281098321021',
            'ERC20 ' => '129210983921890281098321021',
        ];
        return $address[$addr];
    }
    public function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    public function transacsion($code)
    {
        $history = History::where('code', $code)->first();
        $priceSell = 0;
        $priceBuy = 0;
        $price  = file_get_contents('https://www.kucoin.com/_api/otc/ad/list?status=PUTUP&currency=USDT&legal=VND&page=1&pageSize=1&side=BUY&amount=&payTypeCodes=&c=599a192864b44432897171ea659df91b&lang=vi_VN');

        if ($price) {
            $price = json_decode($price);

            $price = $price->items[0]->premium;
            $priceSell = number_format($this->calPriceSell($price));

            $priceBuy = number_format($this->calPriceBuy($price));
        }
        if ($history) {
            $fullPath =  $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/'.$history->code;
            $result['address'] = $this->Diachivi($history->network);


            return view('page.transacsion', ['history'=> $history,'priceSell' => $priceSell, 'priceBuy' => $priceBuy,'fullPath'=>$fullPath,'result'=>$result]);
        }
        return view('page.sell', ['priceSell' => $priceSell, 'priceBuy' => $priceBuy]);

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
            $price  = file_get_contents('https://www.kucoin.com/_api/otc/ad/list?status=PUTUP&currency=USDT&legal=VND&page=1&pageSize=1&side=BUY&amount=&payTypeCodes=&c=599a192864b44432897171ea659df91b&lang=vi_VN');

            if ($price) {
                $price = json_decode($price);

                $price = $price->items[0]->premium;
                settype($data['amount'], 'float');
                //false
                $priceSell =  (int) $this->calPriceSell($price);

                $data['price'] = $priceSell;
                $data['status'] = 2;
                $data['code'] = $this->generateRandomString(15);

                $data['total'] = $priceSell * ($data['amount'] + $data['fee']);




                $result = History::create($data);

                $result['address'] = $this->Diachivi($data['network']);


                return redirect($data['code']);
            }
        } catch (\Throwable $th) {
            throw $th;

            return redirect()->back()->withErrors($th->getMessage())->withInput();
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function calPriceBuy($price)
    {
        $priceSell =  $price + 200;
        return $priceSell;
    }
    public function calPriceSell($price)
    {
        $priceSell =  $price - 200;
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

        $price  = file_get_contents('https://www.kucoin.com/_api/otc/ad/list?status=PUTUP&currency=USDT&legal=VND&page=1&pageSize=1&side=SELL&amount=&payTypeCodes=&c=599a192864b44432897171ea659df91b&lang=vi_VN');

        if ($price) {
            $price = json_decode($price);

            $price = $price->items[0]->premium;


            $max = $max_usd * $price;
            $priceSell = number_format($this->calPriceSell($price));

            $priceBuy = number_format($this->calPriceBuy($price));
        }

        return view('page.buy', ['priceSell' => $priceSell, 'priceBuy' => $priceBuy, 'max' => $max]);
    }
    public function sell()
    {
        $priceSell = 0;
        $priceBuy = 0;
        $price  = file_get_contents('https://www.kucoin.com/_api/otc/ad/list?status=PUTUP&currency=USDT&legal=VND&page=1&pageSize=1&side=BUY&amount=&payTypeCodes=&c=599a192864b44432897171ea659df91b&lang=vi_VN');

        if ($price) {
            $price = json_decode($price);

            $price = $price->items[0]->premium;
            $priceSell = number_format($this->calPriceSell($price));

            $priceBuy = number_format($this->calPriceBuy($price));
        }
        return view('page.sell', ['priceSell' => $priceSell, 'priceBuy' => $priceBuy]);
    }
}
