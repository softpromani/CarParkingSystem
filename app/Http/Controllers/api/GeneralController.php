<?php
namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function getBrand(Request $req)
    {
        $brand = Brand::query();
        if ($req->filled('search')) {
            $brand->where('brand_name', 'Like', '%' . $req->search . '%');
        }
        $brand = $brand->paginate(10)->withQueryString();
        return response()->json(['status' => true, 'data' => $brand, 'message' => 'Brand Fetch successfully']);
    }
    public function getBrandModel(Request $req, $brandId)
    {
        $brand = Brand::find($brandId);

        if (! $brand) {
            return response()->json([
                'status'  => false,
                'message' => 'Brand not found',
            ], 404);
        }

        $modelQuery = $brand->brandModels();

        if ($req->filled('search')) {
            $modelQuery->where('model_name', 'like', '%' . $req->search . '%');
        }

        $models = $modelQuery->paginate(10)->withQueryString();

        return response()->json([
            'status'  => true,
            'data'    => $models,
            'message' => 'Brand models fetched successfully',
        ]);
    }
}
