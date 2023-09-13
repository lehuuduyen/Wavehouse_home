<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSupplierRequest;
use App\Models\Supplier;
use App\Models\Wavehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class KhoController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $param = (isset($_GET['s'])) ? $_GET['s'] : "";
        if ($param) {
            $wavehouses = Wavehouse::where('name', 'like', '%' . $param . '%')->orWhere('code', 'like', '%' . $param . '%')->get();
        } else {
            $wavehouses = Wavehouse::with('Coupon')->get();
        }

        foreach ($wavehouses as $key => $wavehouse) {
            $temp = [];

            foreach ($wavehouse->coupon as $key2 => $coupon) {

                foreach ($coupon->CouponProduct as $key3 => $listProduct) {

                    if (!isset($temp[$listProduct->product_id]['quantity'])) {
                        $temp[$listProduct->product_id]['quantity'] = 0;
                    }
                    if ($coupon->status == 1) {
                        $temp[$listProduct->product_id]['quantity'] += $listProduct->quantity;
                    }else{
                        $temp[$listProduct->product_id]['quantity'] -= $listProduct->quantity;

                    }
                    $temp[$listProduct->product_id]['name'] = $listProduct->product->name;
                    $temp[$listProduct->product_id]['code'] = $listProduct->product->code;
                }
            }
            $wavehouses[$key]['list_product'] = $temp;
        }

        return response()->json(
            array(
                'status' => 'success',
                'data' => $wavehouses
            ),
            200
        );
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules = array(
            'name' => 'required|string|max:255'
        );
        $messages = array(
            'name.required' => 'Tên nhà cung cấp không được để trống',
        );
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return  $this->responseError($validator->errors()->first());
        }
        $data = $request->all();
        if (!isset($data['code'])) {
            $data['code'] = $this->generateRandomString();
        }
        $result = Supplier::create($data);

        return $this->responseSuccess($result, 'Thêm nhà cung cấp thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        //
    }
}
