<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSupplierRequest;
use App\Models\Products;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends BaseController
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
            $products = Products::where('name', 'like', '%' . $param . '%')->orWhere('code', 'like', '%' . $param . '%')->orWhere('barcode', 'like', '%' . $param . '%')->get();
        } else {
            $products = Products::get();
        }

        return response()->json(
            array(
                'status' => 'success',
                'data' => $products
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
            'name' => 'required|string|max:255',
            'price_sell' => 'required|string|max:255',
            'price_capital' => 'required|string|max:255'
        );
        $messages = array(
            'name.required' => 'Tên sản phẩm không được để trống',
            'price_sell.required' => 'Giá bán không được để trống',
            'price_capital.required' => 'Giá vốn không được để trống',
        );
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return $this->responseError($validator->errors()->first());
        }
        $data = $request->all();
        if (!isset($data['code'])) {
            $data['code'] = $this->generateRandomString();
        }
        if (!isset($data['barcode'])) {
            $data['barcode'] = $this->generateRandomString();
        }
        if (isset($data['price_sell'])) {
            $data['price_sell'] = str_replace('$',"",$data['price_sell']);
            $data['price_sell'] = str_replace(',',"",$data['price_sell']);
        }
        if (isset($data['price_capital'])) {
            $data['price_capital'] = str_replace('$',"",$data['price_capital']);
            $data['price_capital'] = str_replace(',',"",$data['price_capital']);
        }
        
        
        if(!empty($_FILES["files"]['tmp_name'])){
            $currentWorkingDirectory = getcwd(); // Get the current working directory
            $targetDirectory = $currentWorkingDirectory; // Create a directory to store uploaded files
            $nameFile ="/uploads/".$this->generateRandomString(5).basename($_FILES["files"]["name"]);
            $targetFile = $targetDirectory .$nameFile;
            if (move_uploaded_file($_FILES["files"]["tmp_name"], $targetFile)) {
                $data['file'] = $nameFile;
            } else {
                return $this->responseError('Upload file fail');
            }
        }
        if(!empty($data['id'])){
            $result = Products::where('id',$data['id'])->update($data);
            $mess ='Cập nhật sản phẩm thành công';
        }else{
            $result = Products::create($data);
            $mess ='Thêm sản phẩm thành công';

        }

        return $this->responseSuccess($result,$mess );
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