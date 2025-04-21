<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $brands = Brand::all(); // get all brands
    return view('admin.brand', compact('brands'));
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
        $validated = $request->validate([
            'brand_name' => 'required',
            'icon' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
        ]);

        // Store image in 'public/brand'
        $path = $request->file('icon')->store('brand', 'public');

        Brand::create([
            'brand_name' => $validated['brand_name'],
            'icon' => $path,
        ]);

        toast('Brand Created Successfully!', 'success');
        return redirect()->route('admin.brand.index');
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
        $brand = Brand::findOrFail($id);
        $brands = Brand::all();

        return view('admin.brand', compact('brand', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'brand_name' => 'required',
            'icon' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
        ]);

        $brand = Brand::findOrFail($id);

        if ($request->hasFile('icon')) {
            // Delete old file if exists
            if ($brand->icon && \Storage::disk('public')->exists($brand->icon)) {
                \Storage::disk('public')->delete($brand->icon);
            }

            // Store new image
            $path = $request->file('icon')->store('brand', 'public');
            $brand->icon = $path;
        }

        $brand->brand_name = $validated['brand_name'];
        $brand->save();

        toast('Brand Updated Successfully!', 'success');
        return redirect()->route('admin.brand.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::findOrFail($id);

        if ($brand->icon && \Storage::disk('public')->exists($brand->icon)) {
            \Storage::disk('public')->delete($brand->icon);
        }

        $brand->delete();

        toast('Brand Deleted Successfully!', 'success');
        return redirect()->route('admin.brand.index');
    }

}
