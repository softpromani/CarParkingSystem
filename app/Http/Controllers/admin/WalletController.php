<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\WalletHistory;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $amounts = WalletHistory::all();
        $users   = User::all();
        return view('admin.wallet.add-amount', compact('amounts', 'users'));
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
            'user_id' => 'required',
            'amount'  => 'required',

        ]);

        $wallet = WalletHistory::create([
            'user_id'        => $request['user_id'],
            'payment_method' => 'offline',
            'amount'         => $request['amount'],
            'type'           => 'credit',
            'note'           => 'Amount Added By Admin',
            'created_by'     => auth()->id(),
        ]);

        toast('Amount added successfully!', 'Success');
        return redirect()->back();
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
}
