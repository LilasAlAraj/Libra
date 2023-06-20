<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use illuminate\validation;
use App\Models\User;
use Validator;
use JWTAuth;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function login(Request $request){
    	$validator = Validator::make($request->all(), [
            'phone' => 'required',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        if (! $token = auth()->guard('api')->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->createNewToken($token);
    }

    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|',
            'last_name' => 'required|string|',
            'mother_name' => 'string',
            'father_name' => 'string',
            'phone'=> 'required|string|unique',
            'current_address'=> 'string',
            'date_of_birth'=> 'date',
            'place_of_birth'=> 'string',
            'email' => 'required|string|email|max:100|unique:users',
            'email_verified_at'=> 'timestamp',
            'password' => 'required|string|confirmed|min:6',
            'status' =>'string',
            'role_name' =>'string',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $user = User::create(array_merge(
                    $validator->validated(),
                    ['password' => bcrypt($request->password)]
                ));
        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);
    }

    public function logout() {
        auth()->guard('api')->logout();
        return response()->json(['message' => 'User successfully signed out']);
    }

    public function refresh() {
        return $this->createNewToken(auth()->guard('api')->refresh());
    }

    public function userProfile() {
        return response()->json(auth()->guard('api')->user());
    }

    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->guard('api')->factory()->getTTL() * 43800 ,
            'user' => auth()->guard('api')->user()
        ]);
    }

    public function changePassword(Request $request)
    {
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            'old_password' => 'required|string',
            'new_password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()], 400);
        }
        // التحقق من كلمة المرور القديمة
        if (!Hash::check($request->input('old_password'), $user->password)) {
            return response()->json(['status' => 'error', 'message' => 'كلمة المرور القديمة غير صحيحة'], 400);
        }

        $user->password = Hash::make($request->input('new_password'));
        $user->save();
        return response()->json(['status' => 'success', 'message' => 'تم تغيير كلمة المرور بنجاح']);
    }


}
