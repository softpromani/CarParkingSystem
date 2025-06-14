<?php

namespace App\Http\Controllers\api;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{


    public function guardLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|digits:10',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }


        $user = User::where('mobile_number', $request->phone)->first();

        if ($user && $user->hasRole('guard')) {
            $otp = rand(1000, 9999);
            $expiry = Carbon::now()->addMinutes(5);

            $user->update([
                'otp' => $otp,
                'otp_expires_at' => $expiry
            ]);


            return response()->json([
                'status' => true,
                'message' => 'OTP sent to guard user',
                'otp' => $otp,
                'expires_at' => $expiry->toDateTimeString()
            ]);
        }

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User not found !'
            ]);
        }


    }
    public function verifyOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|digits:10',
            'otp' => 'required|digits:4'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::where('mobile_number', $request->phone)->first();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Phone number not registered'
            ]);
        }

        if (
            $user->otp !== $request->otp ||
            !$user->otp_expires_at ||
            now()->gt($user->otp_expires_at)
        ) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid or expired OTP'
            ]);
        }

        // OTP is correct and valid
        $user->update([
            'otp' => null,
            'otp_expires_at' => null
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => true,
            'message' => 'OTP verified. Login successful.',
            'token' => $token,
            'user' => $user
        ]);
    }

    public function vehicleOwnerLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|digits:10',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }


        $user = User::where('mobile_number', $request->phone)->first();

        if ($user && $user->hasRole('vehicle_owner')) {
            $otp = rand(1000, 9999);
            $expiry = Carbon::now()->addMinutes(5);

            $user->update([
                'otp' => $otp,
                'otp_expires_at' => $expiry
            ]);


            return response()->json([
                'status' => true,
                'message' => 'OTP sent to guard user',
                'otp' => $otp,
                'expires_at' => $expiry->toDateTimeString()
            ]);
        }

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User not found. Please register.'
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'User not found. Please register.'
        ]);
    }



    public function registerVehicleOwner(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|digits:10|unique:users,mobile_number',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);


        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('users', 'public');
        }

        $otp = rand(1000, 9999);
        $expiry = Carbon::now()->addMinutes(5);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'mobile_number' => $request->phone,
            'created_by' => 'Self',
            'image' => $imagePath,
            'otp' => $otp,
            'otp_expires_at' => $expiry,
        ]);

        $user->assignRole('vehicle_owner');

        return response()->json([
            'status' => true,
            'message' => 'Vehicle Owner registered successfully. OTP sent.',
            'otp' => $otp,
            'expires_at' => $expiry->toDateTimeString()
        ]);
    }

    public function viewProfile(Request $request)
    {
        $user = $request->user();

        return response()->json([
            'status' => true,
            'user' => [
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'email' => $user->email,
                'phone' => $user->phone,
                'image_url' => $user->image ? asset('storage/' . $user->image) : null,
                'role' => $user->getRoleNames()->first()
            ]
        ]);
    }

    public function updateProfile(Request $request)
    {
        $user = $request->user();

        $validator = Validator::make($request->all(), [
            'first_name' => 'nullable|string|max:50',
            'last_name' => 'nullable|string|max:50',
            'email' => 'nullable|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|digits:10|unique:users,phone,' . $user->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        if ($request->hasFile('image')) {
            // delete old image
            if ($user->image && Storage::disk('public')->exists($user->image)) {
                Storage::disk('public')->delete($user->image);
            }

            // store new image
            $imagePath = $request->file('image')->store('users', 'public');
            $user->image = $imagePath;
        }

        // update other fields
        $user->first_name = $request->first_name ?? $user->first_name;
        $user->last_name = $request->last_name ?? $user->last_name;
        $user->email = $request->email ?? $user->email;
        $user->phone = $request->phone ?? $user->phone;

        $user->save();

        return response()->json([
            'status' => true,
            'message' => 'Profile updated successfully',
            'user' => [
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'email' => $user->email,
                'phone' => $user->phone,
                'image_url' => $user->image ? asset('storage/' . $user->image) : null,
                'role' => $user->getRoleNames()->first()
            ]
        ]);
    }









}
