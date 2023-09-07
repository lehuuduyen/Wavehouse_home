<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSupplierRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SupplierController extends BaseController
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
            $supplier = Supplier::where('name', 'like', '%' . $param . '%')->orWhere('code', 'like', '%' . $param . '%')->get();
        } else {
            $supplier = Supplier::get();
        }

        return response()->json(
            array(
                'status' => 'success',
                'data' => $supplier
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
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try {
            //code...
            $request->validate([
                'name' => 'required|string|max:255',
            ], [
                'name.required' => 'Tên nhà cung cấp không được để trống',
            ]);
            $data = $request->all();
            if (!isset($data['code'])) {
                $data['code'] = $this->generateRandomString();
            }
            $result = Supplier::create($data);

            return response()->json(
                array(
                    'status' => 'success',
                    'data' => $result
                ),
                200
            );
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json($th,
                200
            );
        }
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
