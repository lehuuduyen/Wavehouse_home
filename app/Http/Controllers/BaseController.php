<?php

namespace App\Http\Controllers;


class BaseController extends Controller
{
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    function responseSuccess($result, $message,$code =200){
        return response()->json(
            array(
                'status' => 'success',
                'code' => $code,
                'data' => $result,
                'message'=>$message

            ),
            $code
        );
    }
    function responseError($message , $code =500){
        return response()->json(
            array(
                'status' => 'error',
                'code' => $code,
                'data' => '',
                'message'=>$message
            ),
            $code
        );
    }
}
