<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(User::role('vehicle_owner')->withcount(['vehicles', 'bookings']))
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '<a href="#">Edit</a>';
                })
                ->addColumn('vehicles_count', function ($row) {
                    return '<a href="#">' . $row->vehicles_count . '</a>';
                })
                ->addColumn('bookings_count', function ($row) {
                    return '<a href="#">' . $row->bookings_count . '</a>';
                })
                ->addColumn('name', function ($user) {
                    return $user->name; // will call accessor or appended value
                })
                ->rawColumns(['action', 'vehicles_count', 'bookings_count'])
                ->make(true);
        }
        $columns = [
            ['data' => 'DT_RowIndex', 'name' => 'DT_RowIndex', 'label' => '#', 'orderable' => false, 'searchable' => false],
            ['data' => 'name', 'name' => 'name', 'label' => 'Name'],
            ['data' => 'email', 'name' => 'email', 'label' => 'Email'],
            ['data' => 'mobile_number', 'name' => 'mobile_number', 'label' => 'Phone'],
            ['data' => 'wallet_amount', 'name' => 'wallet_amount', 'label' => 'Wallet'],
            ['data' => 'vehicles_count', 'name' => 'vehicles_count', 'label' => 'Vehicle'],
            ['data' => 'bookings_count', 'name' => 'bookings_count', 'label' => 'Bookings'],
            ['data' => 'action', 'name' => 'action', 'label' => 'Action', 'orderable' => false, 'searchable' => false],
        ];

        return view('admin.customer.index', compact('columns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'      => 'required',
            'last_name'       => 'required',
            'billing_address' => 'nullable',
            'sitting_address' => 'nullable',
            'phone'           => 'nullable',
            'email'           => 'nullable',
            'pin_code'        => 'nullable',
        ]);

        $request = Customer::create([
            'first_name'      => $request['first_name'],
            'last_name'       => $request['last_name'],
            'billing_address' => $request['billing_address'],
            'sitting_address' => $request['sitting_address'],
            'phone'           => $request['phone'],
            'email'           => $request['email'],
            'pin_code'        => $request['pin_code'],

        ]);

        toast('Customer added successfully!', 'Success');
        return redirect()->route('admin.customer.index');
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
        $editcustomer = Customer::findOrFail($id);
        $customers    = Customer::all();

        return view('admin.customer.create', compact('editcustomer', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate incoming request data
        $request->validate([
            'first_name'      => 'required',
            'last_name'       => 'required',
            'billing_address' => 'nullable',
            'sitting_address' => 'nullable',
            'phone'           => 'nullable',
            'email'           => 'nullable',
            'pin_code'        => 'nullable',
        ]);

        // Find the customer by ID
        $customer = Customer::findOrFail($id);

        // Update customer fields
        $customer->update([
            'first_name'      => $request->input('first_name'),
            'last_name'       => $request->input('last_name'),
            'billing_address' => $request->input('billing_address'), // Use old value if not provided
            'sitting_address' => $request->input('sitting_address'),
            'email'           => $request->input('email'),
            'phone'           => $request->input('phone'),
            'pin_code'        => $request->input('pin_code'),
        ]);

        // Redirect back with a success message or any other response
        toast('Customer Updated Successfully!', 'Success');
        return redirect()->route('admin.customer.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        toast('Customer Deleted Successfully!', 'success');
        return redirect()->route('admin.customer.index');
    }
    public function vehicles(Request $request, $customerId)
    {
        if ($request->ajax()) {
            $vehicles = Vehicle::query();
            if ($customerId) {
                $vehicles = $vehicles->where('owner_id', $customerId);
            }
            return datatables::of($vehicles)->addIndexColumn()
                ->addColumn('model', function ($row) {
                    return $row->brand->name . '<br/>' . $row->brand_model->name;
                })
                ->addColumn('action', function ($row) {
                    return 'edit';
                });
        }
        $columns = [
            ['data' => 'DT_RowIndex', 'name' => 'DT_RowIndex', 'label' => '#', 'orderable' => false, 'searchable' => false],
            ['data' => 'registration_number', 'name' => 'registration_number', 'label' => 'Registration No'],
            ['data' => 'model', 'name' => 'model', 'label' => 'Model'],
            ['data' => 'tyre', 'name' => 'tyre', 'label' => 'Tyre'],
            ['data' => 'type', 'name' => 'type', 'label' => 'Type'],
            ['data' => 'action', 'name' => 'action', 'label' => 'Action', 'orderable' => false, 'searchable' => false],
        ];
        return view('admin.vehicle.index', compact('columns'));
    }
}
