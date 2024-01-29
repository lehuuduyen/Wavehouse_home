<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSupplierRequest;
use App\Models\Customer;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CustomerController extends BaseController
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
            $customer = Customer::where('name', 'like', '%' . $param . '%')->orWhere('phone', 'like', '%' . $param . '%')->get();
        } else {
            $customer = Customer::get();
        }

        return response()->json(
            array(
                'status' => 'success',
                'data' => $customer
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
            'phone' => 'required|string|max:255|unique:customers'
        );
        $messages = array(
            'name.required' => 'Tên khách hàng không được để trống',
            'phone.required' => 'Số điện thoại khách hàng không được để trống',
            'phone.unique' => 'Số điện thoại đã có',
        );
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return  $this->responseError($validator->errors()->first());
        }
        $data = $request->all();
        if (!isset($data['code']) ) {
            $data['code'] = $this->generateRandomString();
        }
        $result = Customer::create($data);

        return $this->responseSuccess($result,'Thêm khách hàng thành công');
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
