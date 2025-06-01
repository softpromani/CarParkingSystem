<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Parking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $user = User::select(['id', 'first_name', 'last_name', 'email', 'mobile_number']);
            return DataTables::of($user)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '
                        <a href="' . route('admin.user.edit', $row->id) . '" class="btn btn-sm btn-warning"> <i class="bi bi-pencil-square"></i></a>
                        <button onclick="deleteUser(' . $row->id . ')" class="btn btn-sm btn-danger"> <i class="bi bi-trash"></i></button>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::where('name', '!=', 'guard')->pluck('name', 'id')->toArray();
        return view('admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name'       => 'required|string|max:255',
            'last_name'        => 'required|string|max:255',
            'email'       => 'required|email|unique:users,email',
            'mobile_number'    => 'required|string|max:20',
            'role_id'    => 'required',
        ]);


        $validated = User::create([
            'first_name'     => $validated['first_name'],
            'last_name'      => $validated['last_name'],
            'email'          => $validated['email'],
            'password'       => Hash::make('12345678'),
            'mobile_number'  => $validated['mobile_number'],
        ]);

        $role = Role::find($request->role_id);
        $validated->assignRole($role->name);

        toast('User created successfully!', 'success');
        return redirect()->route('admin.user.index');
    }

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
        $edituser = User::findOrFail($id);
        return view('admin.user.create', compact('edituser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'first_name'     => 'required|string|max:255',
            'last_name'      => 'required|string|max:255',
            'email'          => 'required|email|unique:users,email,' . $id,
            'mobile_number'  => 'required|string|max:20',
            'role_id'    => 'required',
        ]);

        $user = User::findOrFail($id);
        $user->update($validated);

        if($request->role_id){
            $user = User::find($id);
            $role = Role::find($request->role_id);
            // Remove all existing roles and assign the new one
            $user->syncRoles([$role->name]);
        }


        toast('User updated successfully!', 'success');
        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
         return response()->json([
            'status' => true,
            'message' => "User deleted Successfully!"
        ]);
    }

}
