<?php

namespace \App\API;

class ApiError{

    public static function erroMessage($message){

        return [
        
        'msg' => $message,
        'code' => $code,

        ];
    }
}