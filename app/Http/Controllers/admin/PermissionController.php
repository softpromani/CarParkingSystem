<?php
namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\Module;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\Facades\DataTables;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $modules = Module::orderBy('id', 'desc')->get();

            return DataTables::of($modules)
                ->addIndexColumn()

                ->addColumn('created_date', function ($row) {
                    return Carbon::parse($row->created_at)->timezone('Asia/Kolkata')->format('m/d/Y');
                })

                ->addColumn('created_time', function ($row) {
                    return Carbon::parse($row->created_at)->timezone('Asia/Kolkata')->format('d/m/Y   H:i:s');
                })
                ->make(true);
        }

        return view('admin.role_permission.permission');
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
    public function store(Request $request)
    {
        $request->validate([
            'permission' => 'required',
        ]);
        $perm = Module::create(['name' => $request->permission]);
        if (isset($perm)) {
            $permission = Permission::create(['name' => $request->permission, 'perm_id' => $perm->id]);
            Permission::create(['name' => $request->permission . '_create', 'perm_id' => $perm->id]);
            Permission::create(['name' => $request->permission . '_read', 'perm_id' => $perm->id]);
            Permission::create(['name' => $request->permission . '_edit', 'perm_id' => $perm->id]);
            Permission::create(['name' => $request->permission . '_delete', 'perm_id' => $perm->id]);
            return isset($permission) ? redirect()->back()->with('success', 'Permission has been created successfully.') : redirect()->back()->with('error', 'Permission is not created');
        } else {
            toast('Something went wrong', 'error');
            return redirect()->back();
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function rolePermission()
    {
        $roles = Role::all();
        return view('admin.role_permission.role_has_permission', compact('roles'));
    }

    public function fetchPermission(Request $request)
    {
        $selectrole = Role::find($request->role);
        $roles      = Role::all();
        $modules    = Module::all();
        return view('admin.role_permission.role_has_permission', compact('roles', 'modules', 'selectrole'));
    }

    public function assignPermission(Request $request)
    {
        $request->validate([
            'roleid'          => 'required',
            'rolepermissions' => 'required',
        ]);

        $role = Role::find($request->roleid);
        $role->syncPermissions($request->rolepermissions);
        toast('Permission Assigned Successfully', 'success');
        return redirect()->route('admin.rolePermission');

    }
}
