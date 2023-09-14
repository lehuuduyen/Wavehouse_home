<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Wavehouse;
use Illuminate\Http\Request;

class WavehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function except()
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
        
        $Wavehouse = Wavehouse::where('id','!=',$_GET['wavehouse_id'])->get();

        return response()->json(
            array(
                'status' => 'success',
                'data' => $Wavehouse
            ),
            200
        );
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wavehouse  $wavehouse
     * @return \Illuminate\Http\Response
     */
    public function show(Wavehouse $wavehouse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wavehouse  $wavehouse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wavehouse $wavehouse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wavehouse  $wavehouse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wavehouse $wavehouse)
    {
        //
    }
}
