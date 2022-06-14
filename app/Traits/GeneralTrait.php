<?php

namespace App\Traits;

trait GeneralTrait
{

    public function returnError( $msg)
    {
        return response()->json([
            'status' => false,
            'Message' => $msg
        ]);
    }


    public function returnSuccessMessage($msg = "")
    {
        return [
            'status' => true,
            'Message' => $msg
        ];
    }

    public function returnData($key, $value, $msg = "")
    {
        return response()->json([
            'status' => true,
            'Message' => $msg,
            $key => $value
        ]);
    }

    public function returnValidationError($validate)
    {
        return response()->json([
            'status' => false,
            'Message' => 'error',
            'validation errors' => $validate
        ]);
    }
 
  
}
