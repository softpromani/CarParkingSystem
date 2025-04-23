<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class faqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = Faq::all();
        return view('admin.faq', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Faq::create([
            'title' => $request['title'],
            'description' => $request['description'],
        ]);

        toast('Faq Created Successfully!', 'success');
        return redirect()->route('admin.faq.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $faqs = Faq::all(); // correct this line
        $editfaq = Faq::findOrFail($id);

        return view('admin.faq', compact('faqs', 'editfaq') );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $faq = Faq::findOrFail($id);

        $faq->update([
            'title' => $request['title'],
            'description' => $request['description'],
        ]);

        toast('Faq Updated Successfully!', 'success');
        return redirect()->route('admin.faq.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();

        toast('Faq Deleted Successfully!', 'success');
        return redirect()->route('admin.faq.index');
    }
}
