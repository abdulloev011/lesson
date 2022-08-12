<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(AuthRequest $request){

            User::create([
                'name' => $request->name,
                'email'=> $request->email,
                'phone' => $request->phone,
                'password' => bcrypt($request->password)
            ]);
            return response()->json([
                'message' => 'Пользователь добавлен'
            ]);
    }

    public function login(Request $request){
        $validator = Validator::make($request->all(),
        [
            'email' => ['required','email'],
            'password' => ['required', 'string']
        ]);
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')-> accessToken;
            $success['name'] =  $user->name;

            return response()->json([
                'success' => $success
            ]);
        }
    }
}
