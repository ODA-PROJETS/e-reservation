<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function login(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            // $success['token'] =  $user->createToken('MyApp')-> accessToken;
            return response()->json(['success' => $user], 200);

        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }

    }
    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], 200);
    }
}
