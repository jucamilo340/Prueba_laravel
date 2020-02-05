<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Auth;

class AuthenticateController extends Controller
{
    //
    public function authenticate(Request $request){
        $credencials=$request->only(['email','password']);
        try{
            if(!$token=JWTAuth::attempt($credencials)){
                return response()->json(['error'=>'credenciales invalidas']);
               }
            } catch (JWTException $e) {
                return response()->json(['error'=>'cloud_not_create']);
            }

            $response=compact(['token']);
            $response['user']=Auth::user();

            return $response;
        }
}
