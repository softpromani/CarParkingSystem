<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $order = OrderStatus::select(['id', 'name']);
            return DataTables::of($order)
                ->addIndexColumn()
                ->addColumn('name', function ($order) {
                    return $order->name;
              })
              ->addColumn('action', function ($row) {
                return '
                    <a href="' . route('admin.order-status.edit', $row->id) . '" class="btn btn-sm btn-warning">Edit</a>
                    <button onclick="deleteUser(' . $row->id . ')" class="btn btn-sm btn-danger">Delete</button> ';
            })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.order-status');
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
            'name' => 'required',
        ]);

        $order = OrderStatus::create([
            'name' => $request->input('name'),
        ]);

        toast('Order Status added successfully!', 'success');
        return redirect()->route('admin.order-status.index');
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
        $editorder = OrderStatus::findOrFail($id);
        $orders = OrderStatus::all();
        return view('admin.order-status', compact('editorder', 'orders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $order = OrderStatus::findorfail($id);

        $order->update([
            'name' => $request->input('name')
        ]);

        toast('Order Status updated successfully!', 'success');
        return response()->json([
            'status' => true,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = OrderStatus::findOrFail($id);
        $order->delete();

        toast('Order Status Deleted successfully!', 'success');
        return redirect()->route('admin.order-status.index');
    }
}
