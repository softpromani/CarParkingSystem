<?php
namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Otp;
use App\Models\User;
use App\Services\OtpService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function guardLogin(Request $request, OtpService $otpService)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => 'Validation failed',
                'errors'  => $validator->errors(),
            ], 422);
        }

        $user = User::where('mobile_number', $request->phone)->first();

        if ($user && $user->hasRole('guard')) {
            $res = $otpService->send($request->phone);
            return response()->json($res);
        }

        if (! $user || ! $user->hasRole('guard')) {
            return response()->json([
                'status'  => false,
                'message' => 'User not found OR Invalid User!',
            ]);
        }

    }
    public function verifyOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required',
            'otp'   => 'required|digits:4',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => 'Validation failed',
                'errors'  => $validator->errors(),
            ], 422);
        }
        $otpdata = Otp::where('email_phone', $request->phone)->first();
        if (! $otpdata || $otpdata->otp != $request->otp || now()->gte($otpdata->expiry_at)) {
            return response()->json(
                [
                    'status'  => false,
                    'message' => 'Invalid OTP',
                ]
            );
        }
        $user  = User::where('email', $request->phone)->orWhere('mobile_number', $request->phone)->first();
        $token = $user->createToken('auth_token')->plainTextToken;
        Otp::where('email_phone', $request->phone)->delete();
        return response()->json([
            'status'  => true,
            'message' => 'OTP verified. Login successful.',
            'token'   => $token,
            'user'    => $user,
        ]);
    }

    public function vehicleOwnerLogin(Request $request, OtpService $otpService)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => 'Validation failed',
                'errors'  => $validator->errors(),
            ], 422);
        }

        $user = User::where('mobile_number', $request->phone)->first();

        if ($user && $user->hasRole('vehicle_owner')) {
            $res = $otpService->send($request->phone);
            return response()->json($res);
        }

        return response()->json([
            'status'  => false,
            'message' => 'User not found. Please register.',
        ]);
    }

    public function registerVehicleOwner(Request $request, OtpService $otpService)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:50',
            'last_name'  => 'required|string|max:50',
            'email'      => 'required|email|unique:users,email',
            'phone'      => 'required|digits:10|unique:users,mobile_number',
            'image'      => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => 'Validation failed',
                'errors'  => $validator->errors(),
            ], 422);
        }
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('users', 'public');
        }

        $user = User::create([
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'email'         => $request->email,
            'mobile_number' => $request->phone,
            'created_by'    => 'Self',
            'image'         => $imagePath,
        ]);
        $user->assignRole('vehicle_owner');
        $res = $otpService->send($request->phone);
        return response()->json([
            'status'  => true,
            'message' => 'Vehicle Owner registered successfully. OTP sent.',
            'otpData' => $res,
        ]);
    }

    public function logout(Request $request)
    {
        $user = $request->user();

        $user->currentAccessToken()->delete();

        return response()->json([
            'status'  => true,
            'message' => 'Logged out successfully',
        ]);
    }

}
