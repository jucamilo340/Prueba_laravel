<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //create a new user
    public function add(Request $request){
        $name=$request->input('name');
        $surname=$request->input('surname');
        $email=$request->input('email');
        $password=$request->input('password');
        $rol=$request->input('rol');

        $user=new User();
        $user->name=$name;
        $user->surname=$surname;
        $user->email=$email;
        $user->password=Hash::make($password);
        $user->rol=$rol;

        $user->save();

        return $user;
    }
}
