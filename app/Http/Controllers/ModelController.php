<?php

namespace App\Http\Controllers;

use App\Models\Brand; // Brand model import karna
use App\Models\BrandModel; // BrandModel import karna
use Illuminate\Http\Request;

class ModelController extends Controller
{
    public function index()
    {

        $models = BrandModel::with('brand')->get();
        $brands = Brand::all(); 

        return view('admin.model', compact('brands', 'models'));
    }


    public function create()
    {
        // Create form me brands ko pass karne ka logic yaha tha
    }

    public function store(Request $request)
    {
        // Validate form data
        $validated = $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'model_name' => 'required|string|max:255',
        ]);

        // Save the data into BrandModel
        BrandModel::create($validated);

        toast('Model Created Successfully!', 'success');
        return redirect()->route('admin.model.index');
    }

    public function edit(string $id)
    {
        $model = BrandModel::findOrFail($id);
        $brands = Brand::all(); // Get all brands for the select box
        return view('admin.model', compact('model', 'brands'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'model_name' => 'required|string|max:255',
        ]);

        $model = BrandModel::findOrFail($id);
        $model->update($validated);

        toast('Model Updated Successfully!', 'success');
        return redirect()->route('admin.model.index');
    }

    public function destroy(string $id)
    {
        $model = BrandModel::findOrFail($id);
        $model->delete();

        toast('Model Deleted Successfully!', 'success');
        return redirect()->route('admin.model.index');
    }
}

