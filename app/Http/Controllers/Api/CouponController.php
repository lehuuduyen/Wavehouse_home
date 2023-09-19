<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\ImportExportCoupon;
use App\Models\ImportExportCouponProduct;
use App\Models\Products;
use App\Models\Wavehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\Calculation\Financial\Coupons;

class CouponController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!isset($_GET['wavehouse_id']) && empty($_GET['wavehouse_id'])) {
            return response()->json(
                array(
                    'status' => 'error',
                    'data' => ''
                ),
                200
            );
        }
        $param = (isset($_GET['s'])) ? $_GET['s'] : "";
        $paramStatus = (isset($_GET['status'])) ? $_GET['status'] : "";
        $ImportExportCoupon = ImportExportCoupon::with('User')->with('CouponProduct')->with('Supplier')->with('Wavehouse')->with('Customer');
        if ($param) {
            $ImportExportCoupon = $ImportExportCoupon->where(function ($query, $param) {
                $query->where('name', 'like', '%' . $param . '%')->orWhere('code', 'like', '%' . $param . '%');
            });
        }
        if ($paramStatus) {
            $ImportExportCoupon = $ImportExportCoupon->where('status', $paramStatus);
        }
        $ImportExportCoupon = $ImportExportCoupon->where('wavehouse_id', $_GET['wavehouse_id'])->get();

        return response()->json(
            array(
                'status' => 'success',
                'data' => $ImportExportCoupon
            ),
            200
        );
    }
    public function getByCustomer()
    {
        if (!isset($_GET['customer_id']) && empty($_GET['customer_id'])) {
            return response()->json(
                array(
                    'status' => 'error',
                    'data' => 'Khách hàng không tồn tại'
                ),
                200
            );
        }
        $param = (isset($_GET['s'])) ? $_GET['s'] : "";
        
        
        $ImportExportCoupon = ImportExportCoupon::with('User')->with('CouponProduct')->with('Supplier')->with('Wavehouse')->with('Customer');
        if ($param) {
            $ImportExportCoupon = $ImportExportCoupon->where('code', 'like', '%' . $param . '%');
        }
            $ImportExportCoupon = $ImportExportCoupon->where('status', 3);
        
        $ImportExportCoupon = $ImportExportCoupon->where('customer_id', $_GET['customer_id'])->get();
    
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
            // 'supplier_id' => 'required|string|max:255',
        );
        $messages = array(
            'name.required' => 'Ghi chú không được để trống',
            // 'supplier_id.required' => 'Nhà cung cấp không được để trống',
        );
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return $this->responseError($validator->errors()->first());
        }
        DB::beginTransaction();

        try {
            //code...
            
            $data = $request->all();
            if (!isset($data['code'])) {
                $data['code'] = $this->generateRandomString();
            }


            $listProduct = json_decode($data['listProduct']);
            if (is_array($listProduct) && count($listProduct) > 0) {
                if (isset($data['sum'])) {
                    $data['price'] = str_replace('$', "", $data['sum']);
                    $data['price'] = str_replace(',', "", $data['price']);
                }
                if (!empty($data['customer_id'])) {
                    $data['status'] = 3;
                    $coupon = ImportExportCoupon::create($data);
                    foreach ($listProduct as $value) {
                        $checkProductQuantity = $this->checkProductQuantity($data['wavehouse_id'], $value->id, $value->quantity);

                        $priceSell = str_replace('$', "", $value->priceSell);
                        $priceSell = str_replace(',', "", $priceSell);
                        $price_old = str_replace('$', "", $value->price_old);
                        $price_old = str_replace(',', "", $price_old);
                        $couponDetail = ImportExportCouponProduct::create([
                            'product_id' => $value->id,
                            'quantity' => $value->quantity,
                            'price_old' => $price_old ,
                            'price' => $priceSell,
                            'coupon_id' => $coupon->id,
                            'wavehouse_id' => $data['wavehouse_id'],
                            'status' => 3,
                        ]);
                    }
                } else {
                    $data['status'] = 1;
                    $coupon = ImportExportCoupon::create($data);
                    foreach ($listProduct as $value) {
                       
                        $priceSell = str_replace('$', "", $value->priceSell);
                        $priceSell = str_replace(',', "", $priceSell);
                        
                        if (empty($data['wavehouse_from_id'])) {
                          
                            
                            $this->calculatorProductCapital($value->id,$value->quantity,$priceSell);
                            $couponDetail = ImportExportCouponProduct::create([
                                'product_id' => $value->id,
                                'quantity' => $value->quantity,
                                'price' => $priceSell,
                                'coupon_id' => $coupon->id,
                                'wavehouse_id' => $data['wavehouse_id'],
                                'status' => 1,
                            ]);
                        } else {
                            $checkProductQuantity = $this->checkProductQuantity($data['wavehouse_from_id'], $value->id, $value->quantity);
                            $couponDetail = ImportExportCouponProduct::create([
                                'product_id' => $value->id,
                                'quantity' => $value->quantity,
                                'price' => $priceSell,
                                'coupon_id' => $coupon->id,
                                'wavehouse_id' => $data['wavehouse_from_id'],
                                'status' => 1,
                            ]);
                        }
                    }


                    // phieu xuat
                    if (!empty($data['wavehouse_from_id'])) {
                        $data['status'] = 2;
                        $data['wavehouse_id'] = $data['wavehouse_from_id'];
                        $couponExport = ImportExportCoupon::create($data);
                        foreach ($listProduct as $value) {
                            $priceSell = str_replace('$', "", $value->priceSell);
                            $priceSell = str_replace(',', "", $priceSell);
                            $couponDetail = ImportExportCouponProduct::create([
                                'product_id' => $value->id,
                                'quantity' => $value->quantity,
                                'price' => $priceSell,
                                'coupon_id' => $couponExport->id,
                                'wavehouse_id' => $data['wavehouse_from_id'],
                                'status' => 2,
                            ]);
                        }
                    }
                }
            } else {
                throw new \Exception('Sản phẩm không tồn tại');
            }
        } catch (\Throwable $th) {
            DB::rollback();
            return $this->responseError($th->getMessage());
            //throw $th;
        }
        DB::commit();

        return $this->responseSuccess($coupon, 'Tạo phiếu thành công');
    }
    public function calculatorProductCapital($product,$quantity,$price){
        $coupons = ImportExportCouponProduct::select("import_export_coupon_product.id as id_product","import_export_coupon_product.price as price_product","import_export_coupon_product.quantity as quantity_product")->
        join('import_export_coupon','import_export_coupon.id','=','import_export_coupon_product.coupon_id')
        ->where('import_export_coupon.wavehouse_id',1)->where('import_export_coupon.status',1)->where('import_export_coupon_product.product_id',$product)->get();
        $price = $price * $quantity;
        foreach($coupons as $couponProduct){
            if($couponProduct->price_product != 0){
               
                
                $quantity +=$couponProduct->quantity_product;
                $price = $price + ($couponProduct->price_product * $couponProduct->quantity_product );
                
            }
        }
        $priceCapital = ($price) / $quantity;
        print_r($this->responseSuccess( $priceCapital, 'Tạo phiếu thành công'));
        die;
        
        return $coupons;
    }
    public function checkProductQuantity($wavehouseFromId, $productId, $count)
    {
        $wavehouse = Wavehouse::with('Coupon')->where('wavehouse.id', $wavehouseFromId)->first();
        $product = Products::find($productId);

        if (count($wavehouse->coupon) > 0) {
            $soLuongKho = 0;

            foreach ($wavehouse->coupon as $key2 => $coupon) {
                foreach ($coupon->CouponProduct as $key3 => $listProduct) {
                    if ($listProduct->product_id != $productId) {
                        continue;
                    }
                    if ($coupon->status == 1) {
                        $soLuongKho = $soLuongKho + $listProduct->quantity;
                    } else {
                        $soLuongKho = $soLuongKho - $listProduct->quantity;
                    }
                }
            }
            $sum = $soLuongKho - $count;
            if ($sum >= 0) {
                return true;
            }
            throw new \Exception('Trong kho chỉ còn ' . $soLuongKho . ' Sản phẩm ' . $product->name . '');
        }
        throw new \Exception('Sản phẩm ' . $product->name . ' không đủ trong kho');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return $this->responseSuccess(ImportExportCoupon::with('CouponProduct')->with('Wavehouse')->with('Customer')->find($id), 'Get phiếu thành công');
        
        
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
