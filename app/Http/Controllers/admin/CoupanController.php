<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Coupan;
use App\Models\Parking;
use App\Models\User;
use Illuminate\Http\Request;

class CoupanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupans = Coupan::all();
        return view('admin.coupan.index', compact('coupans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $parkings = Parking::all();
        return view('admin.coupan.create', compact('users', 'parkings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $validated = $request->validate([
            'title'         => 'required|string|max:255',
            'discount_type' => 'nullable|string',
            'discount'      => 'nullable|numeric',
            'code'          => 'nullable|string|max:255',
            'coupan_type'   => 'nullable|string',
            'parking_id'    => 'nullable|exists:parkings,id',
            'user_id'       => 'nullable|exists:users,id',
            'validity_start'      => 'nullable|date',
            'validity_end'      => 'nullable|date',
            'coupan_uses'      => 'nullable|string',
        ]);


        Coupan::create([
            'title'         => $validated['title'],
            'discount_type' => $validated['discount_type'] ?? null,
            'discount'      => $validated['discount'] ?? null,
            'code'          => $validated['code'] ?? null,
            'coupan_type'   => $validated['coupan_type'] ?? null,
            'parking_id'    => $validated['parking_id'] ?? null,
            'user_id'       => $validated['user_id'] ?? null,
            'validity_start'      => $validated['validity_start'] ?? null,
            'validity_end'      => $validated['validity_end'] ?? null,
            'coupan_uses'      => $validated['coupan_uses'] ?? null,
        ]);


        toast('Coupan Created Successfully!', 'success');
        return redirect()->route('admin.coupan.index');
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
        $coupans = Coupan::all(); // correct this line
        $editcoupan = Coupan::findOrFail($id);
        $users = User::all();
        $parkings = Parking::all();

        return view('admin.coupan.create', compact('coupans', 'editcoupan', 'users', 'parkings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title'         => 'required|string|max:255',
            'discount_type' => 'nullable|string',
            'discount'      => 'nullable|numeric',
            'code'          => 'nullable|string|max:255',
            'coupan_type'   => 'nullable|string',
            'parking_id'    => 'nullable|integer',
            'user_id'       => 'nullable|exists:users,id',
            'validity_start'      => 'nullable|date',
            'validity_end'      => 'nullable|date',
            'coupan_uses'      => 'nullable|string',
        ]);

        $coupan = Coupan::findOrFail($id); // Fetch the coupan record

        $coupan->update([
            'title'         => $validated['title'],
            'discount_type' => $validated['discount_type'] ?? null,
            'discount'      => $validated['discount'] ?? null,
            'code'          => $validated['code'] ?? null,
            'coupan_type'   => $validated['coupan_type'] ?? null,
            'parking_id'    => $validated['parking_id'] ?? null,
            'user_id'       => $validated['user_id'] ?? null,
            'validity_start'      => $validated['validity_start'] ?? null,
            'validity_end'      => $validated['validity_end'] ?? null,
            'coupan_uses'      => $validated['coupan_uses'] ?? null,
        ]);

        toast('Coupan Updated Successfully!', 'success');
        return redirect()->route('admin.coupan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $coupan = Coupan::findOrFail($id);
        $coupan->delete();

        toast('Coupan Deleted Successfully!', 'success');
        return redirect()->route('admin.coupan.index');
    }
}
