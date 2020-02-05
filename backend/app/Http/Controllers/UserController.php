<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function add(Request $request){
        $user=User::create($request->all());
        return $user;
    }
}
