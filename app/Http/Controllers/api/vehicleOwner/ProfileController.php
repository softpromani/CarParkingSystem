<?php
namespace App\Http\Controllers\api\vehicleOwner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;

class ProfileController extends Controller
{
    public function getProfile()
    {
        return response()->json([
            'status'  => true,
            'data'    => auth()->user(),
            'message' => 'Profile Get Successfully',
        ]);
    }
    public function updateProfile(Request $request)
    {
        $user = $request->user();

        $validator = Validator::make($request->all(), [
            'first_name' => 'nullable|string|max:50',
            'last_name'  => 'nullable|string|max:50',
            'email'      => 'nullable|email|unique:users,email,' . $user->id,
            'phone'      => 'nullable|digits:10|unique:users,phone,' . $user->id,
            'image'      => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => 'Validation failed',
                'errors'  => $validator->errors(),
            ], 422);
        }

        if ($request->hasFile('image')) {
            // delete old image
            if ($user->image && Storage::disk('public')->exists($user->image)) {
                Storage::disk('public')->delete($user->image);
            }

            // store new image
            $imagePath   = $request->file('image')->store('users', 'public');
            $user->image = $imagePath;
        }

        // update other fields
        $user->first_name    = $request->first_name ?? $user->first_name;
        $user->last_name     = $request->last_name ?? $user->last_name;
        $user->email         = $request->email ?? $user->email;
        $user->mobile_number = $request->phone ?? $user->mobile_number;

        $user->save();

        return response()->json([
            'status'  => true,
            'message' => 'Profile updated successfully',
            'user'    => [
                'first_name' => $user->first_name,
                'last_name'  => $user->last_name,
                'email'      => $user->email,
                'phone'      => $user->mobile_number,
                'image_url'  => $user->image ? asset('storage/' . $user->image) : null,
                'role'       => $user->getRoleNames()->first(),
            ],
        ]);
    }
}
