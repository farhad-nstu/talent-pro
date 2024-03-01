<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(Request $request) {
        $data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);
        $data['password'] = bcrypt($request->password);
        $user = User::create($data);
        $token_obj = $user->createToken('API Token')->accessToken;
        $reponse['token'] = $token_obj->token;
        $reponse['user'] = $user;
        return response()->json($reponse, 200);
    }

    public function login(Request $request) {
        $data = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);
        if (!auth()->attempt($data)) {
            return response(['error_message' => 'Incorrect Details. Please try again.']);
        }
        $token_obj = auth()->user()->createToken('API Token')->accessToken;
        $reponse['token'] = $token_obj->token;
        $reponse['user'] = auth()->user();
        return response()->json($reponse, 200);
    }

    public function logout (Request $request) {
        dd(auth()->guard('api')->user());
        $reponse['user'] = auth()->user();
        return response()->json($reponse, 200);
        // $token = $request->user()->token();
        auth('sanctum')->user()->token()->delete();
        // $token->revoke();
        $response = ['message' => 'You have been successfully logged out!'];
        return response($response, 200);
    }
}
