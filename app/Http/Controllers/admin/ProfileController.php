<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = User::find(Auth::user()->id);
        return view('admin.auth.profile', compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $editprofile = User::findOrFail(Auth::user()->id);
        return view('admin.auth.profile', compact('editprofile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'image' => 'nullable',
            'email' => 'required',
            'mobile_number'    => 'required|string|max:20',

        ]);

        $profiles = User::findOrFail($id);

        $imageProfile = null;
        if ($request->hasFile('image')) {
            $imageProfile = $request->file('image')->store('profile', 'public');
            $profiles->update([
                'image' => $imageProfile,
            ]);
        }



        $profiles->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'mobile_number' => $request->input('mobile_number'),

        ]);



        toast('Profile updated successfully!', 'success');
        return redirect()->route('admin.profile.index');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required_with:new_password|string',
            'new_password' => 'required_with:current_password|string|min:6|confirmed',
        ]);

        $profiles = Auth::user();

        if ($request->filled('current_password') && $request->filled('new_password')) {
            if (Hash::check($request->current_password, $profiles->password)) {
                $profiles->password = Hash::make($request->new_password);
                $profiles->save(); // ✅ This line is necessary

                toast('Password changed successfully!', 'success');
                return redirect()->route('admin.profile.index');
            } else {
                return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect.']);
            }
        }

        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
