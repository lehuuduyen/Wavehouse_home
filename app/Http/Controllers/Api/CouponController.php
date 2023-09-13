<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\ImportExportCoupon;
use App\Models\ImportExportCouponProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CouponController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!isset($_GET['wavehouse_id']) && empty($_GET['wavehouse_id'])){
            return response()->json(
                array(
                    'status' => 'error',
                    'data' => ''   
                ),
                200
            );
        }
        $param = (isset($_GET['s'])) ? $_GET['s'] : "";
        if ($param) {
            $ImportExportCoupon = ImportExportCoupon::with('CouponProduct')->with('Supplier')->with('Wavehouse')->where('name', 'like', '%' . $param . '%')->orWhere('code', 'like', '%' . $param . '%')->get();
        } else {
            $ImportExportCoupon = ImportExportCoupon::with('CouponProduct')->with('Supplier')->with('Wavehouse')->where('wavehouse_id',  $_GET['wavehouse_id'] )->get();
        }
        return response()->json(
            array(
                'status' => 'success',
                'data' => $ImportExportCoupon   
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
        $rules = array(
            'name' => 'required|string|max:255',
            'supplier_id' => 'required|string|max:255',
        );
        $messages = array(
            'name.required' => 'Ghi chú không được để trống',
            'supplier_id.required' => 'Nhà cung cấp không được để trống',
        );
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return $this->responseError($validator->errors()->first());
        }
        try {
            //code...
            $data = $request->all();

        if (!isset($data['code']) ) {
            $data['code'] = $this->generateRandomString();
        }
        $listProduct = json_decode($data['listProduct']);
        if(count($listProduct)>0)        
        {
            if (isset($data['sum'])) {
                $data['price'] = str_replace('$',"",$data['sum']);
                $data['price'] = str_replace(',',"",$data['price']);
            }
            $data['wavehouse_id'] =1;
            $data['status'] =1;
            $data['user_id'] =1;
            $coupon = ImportExportCoupon::create($data);
            foreach($listProduct as $value){
                $priceSell = str_replace('$',"",$value->priceSell);
                $priceSell = str_replace(',',"",$priceSell);
                $couponDetail = ImportExportCouponProduct::create([
                    'product_id' => $value->id,
                    'quantity' => $value->quantity,
                    'price' => $priceSell,
                    'coupon_id' => $coupon->id,
                    'wavehouse_id' => 1,
                    'status' => 1,
                ]);
                
            }

        }else{
            return $this->responseError('Sản phẩm không tồn tại');
        }
        } catch (\Throwable $th) {
            return $this->responseError('Sản phẩm không được để rỗng');
            //throw $th;
        }
        

        return $this->responseSuccess($coupon,'Thêm nhà cung cấp thành công');
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
