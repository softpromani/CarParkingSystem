<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\GuardParkingMap;
use App\Models\Parking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class GuardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(User::role('guard')->withcount(['vehicles', 'bookings']))
                ->addIndexColumn()
                ->addColumn('duty', function ($row) {
                    return $row->parking?->name . '<br/>' . $row->parking?->address;
                })
                ->addColumn('action', function ($row) {
                    return '
                    <div class="dropstart">
                        <button class="btn bg-white btn-sm" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                    <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="' . route('admin.guard.edit', $row->id) . '">Edit</a>
                            </li>
                            <li>
                                <a class="dropdown-item text-danger" href="#"
                                    onclick="event.preventDefault(); confirmDelete(' . $row->id . ')">
                                    Delete
                                </a>

                                <form id="delete-form-' . $row->id . '" action="' . route('admin.guard.destroy', $row->id) . '"
                                    method="POST" style="display: none;">
                                   <input type="hidden" name="_token" value="' . csrf_token() . '">
                                <input type="hidden" name="_method" value="DELETE">
                                </form>
                            </li>
                        </ul>
                        </div>';
                })
                ->addColumn('name', function ($user) {
                    return $user->name; // will call accessor or appended value
                })
                ->rawColumns(['action', 'duty'])
                ->make(true);
        }
        $columns = [
            ['data' => 'DT_RowIndex', 'name' => 'DT_RowIndex', 'label' => '#', 'orderable' => false, 'searchable' => false],
            ['data' => 'name', 'name' => 'name', 'label' => 'Name'],
            ['data' => 'email', 'name' => 'email', 'label' => 'Email'],
            ['data' => 'mobile_number', 'name' => 'mobile_number', 'label' => 'Phone'],
            ['data' => 'duty', 'name' => 'duty', 'label' => 'Duty On'],
            ['data' => 'action', 'name' => 'action', 'label' => 'Action', 'orderable' => false, 'searchable' => false],
        ];

        return view('admin.guard.index', compact('columns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users    = User::all();
        $parkings = Parking::all();
        return view('admin.guard.create', compact('users', 'parkings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name'    => 'required|string|max:255',
            'last_name'     => 'required|string|max:255',
            'email'         => 'nullable|email|unique:users,email',
            'mobile_number' => 'nullable|string|max:20',
            'parking_id'    => 'nullable|exists:parkings,id',
        ]);

        // Step 1: Create the user
        $user = User::create([
            'first_name'    => $validatedData['first_name'],
            'last_name'     => $validatedData['last_name'],
            'email'         => $validatedData['email'],
            'password'      => Hash::make('12345678'),
            'mobile_number' => $validatedData['mobile_number'],
            'created_by'    => 'Admin',
        ]);
        $user->assignRole('guard');

        // Step 2: Map the guard to a parking
        GuardParkingMap::create([
            'parking_id' => $validatedData['parking_id'],
            'guard_id'   => $user->id,
        ]);

        toast('Guard Created Successfully!', 'success');
        return redirect()->route('admin.guard.index');
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
        $user     = User::with('parking_guard.parking')->findOrFail($id);
        $parkings = Parking::all();
        return view('admin.guard.create', compact('user', 'parkings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'first_name'    => 'nullable|string',
            'last_name'     => 'nullable|string',
            'email'         => 'nullable|email',
            'mobile_number' => 'nullable',

        ]);

        // Update user info
        $user->update($request->only(['first_name', 'last_name', 'email', 'mobile_number']));

        // Update or create parking mapping
        $user->parking_guard()->updateOrCreate(
            ['guard_id' => $user->id],
            ['parking_id' => $request->parking_id]
        );

        toast('Guard Updated Successfully!', 'success');
        return redirect()->route('admin.guard.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        // 🧹 Delete GuardParkingMap record if exists
        GuardParkingMap::where('guard_id', $user->id)->delete();

        // ❌ Then delete the user
        $user->delete();

        toast('Guard Deleted Successfully!', 'success');
        return redirect()->route('admin.guard.index');
    }
}
