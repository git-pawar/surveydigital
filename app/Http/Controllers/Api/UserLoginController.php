<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserLoginController extends Controller
{
    function loginUser(Request $request)
    {
        try {
            $validate = Validator::make($request->all(), [
                'mobile' => ['required', 'digits:10'],
                'password' => ['required'],
            ]);
            if ($validate->fails()) {
                return $this->sendError('Validation Error.', $validate->errors());
            } else {
                $mobile = $request->mobile;
                $password = $request->password;
                $user = User::where(['type' => 'warduser', 'mobile' => $mobile, 'is_active' => 1])->first();
                if ($user) {
                    if (Hash::check($password, $user->password)) {
                        $token = $user->createToken($mobile);
                        // $user->update(['remember_token' => $token->plainTextToken]);
                        $ward_no = $user->wards->ward_no;
                        $url = url('wardpdf/Ward' . $ward_no . '.pdf');
                        $response = [
                            'accessToken' => $token->plainTextToken,
                            'url' => $url,
                            'ward_no' => $ward_no
                        ];
                        return ['success' => true, 'message' => 'Successfully login', 'data' => $response];
                    } else {
                        return ['success' => false, 'message' => 'Wrong credential'];
                    }
                } else {
                    return ['success' => false, 'message' => 'No user found with this number'];
                }
            }
        } catch (\Exception $exception) {
            return $this->sendError('Server Error.', $exception->getMessage());
        }
    }
    function logoutUser(Request $request)
    {
        try {
            $request->user()->currentAccessToken()->delete();
            return ['success' => true, 'message' => 'Successfully logout'];
        } catch (\Exception $exception) {
            return $this->sendError('Server Error.', $exception->getMessage());
        }
    }
}
