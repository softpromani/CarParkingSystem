<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Truck;
use App\Models\TruckDocument;
use Illuminate\Http\Request;

class TruckController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trucks = Truck::all();
        return view('admin.truck.index', compact('trucks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $trucks = Truck::all();
        return view('admin.truck.create', compact('trucks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'truck_no' => 'required',
            'image' => 'nullable',
            'height' => 'nullable',
            'width' => 'nullable',
            'length' => 'nullable',
            'capacity' =>    'nullable',
            'wheel_count' => 'nullable',
        ]);

        if ($request->hasFile('image')) {
            $imgpath = $request->file('image')->store('truck', 'public');
        }

        $truck = Truck::create([
            'truck_no' => $request['truck_no'],
            'image' =>    $imgpath,
            'height' =>   $request['height'],
            'width' =>    $request['width'],
            'length' =>   $request['length'],
            'capacity' => $request['capacity'],
            'wheel_count' => $request['wheel_count'],
        ]);

        if ($truck) {

            if ($request->hasFile('rc')) {
                $rc_path = $request->file('rc')->store('truck_documents', 'public');
            }
            if ($request->hasFile('pollution')) {
                $pollution_path = $request->file('pollution')->store('truck_documents', 'public');
            }
            if ($request->hasFile('insurance')) {
                $insurance_path = $request->file('insurance')->store('truck_documents', 'public');
            }
            if ($request->hasFile('fitness_certificate')) {
                $fitness_path = $request->file('fitness_certificate')->store('truck_documents', 'public');
            }

            TruckDocument::create([
                'truck_id' => $truck->id,
                'rc' => $rc_path ?? null,
                'pollution' =>   $pollution_path ?? null,
                'insurance' =>    $insurance_path ?? null,
                'fitness_certificate' =>   $fitness_path ?? null,
                'rc_no' => $request->rc_no,
                'pollution_no' => $request->pollution_no,
                'insurance_no' => $request->insurance_no,
                'fitness_no' => $request->fitness_no,
            ]);
        }
        toast('Truck Added Successfully!', 'success');
        return redirect()->route('admin.truck.index');
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

        $trucks = Truck::all();
        $editTruck = Truck::findOrFail($id);


        return view('admin.truck.create', compact('trucks', 'editTruck'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'truck_no' => 'required',
            'image' => 'nullable|image',  // added image validation for uploaded files
            'height' => 'nullable',
            'width' => 'nullable',
            'length' => 'nullable',
            'capacity' => 'nullable',
            'wheel_count' => 'nullable',
        ]);

        // Find the truck to update
        $truck = Truck::findOrFail($id);

        // If an image is uploaded, store it
        if ($request->hasFile('image')) {
            $imgpath = $request->file('image')->store('truck', 'public');
        } else {
            // If no image, retain the existing image
            $imgpath = $truck->image;
        }

        // Update the truck details
        $truck->update([
            'truck_no' => $request->truck_no,
            'image' => $imgpath,  // Only update image if it is uploaded
            'height' => $request->height,
            'width' => $request->width,
            'length' => $request->length,
            'capacity' => $request->capacity,
            'wheel_count' => $request->wheel_count,
        ]);

        // Update or create the truck document record
        $document = TruckDocument::updateOrCreate(
            ['truck_id' => $truck->id],  // Find the document for this truck, or create if not exists
            [
                'rc_no' => $request->rc_no,
                'pollution_no' => $request->pollution_no,
                'insurance_no' => $request->insurance_no,
                'fitness_no' => $request->fitness_no,
            ]
        );

        // Handle the document files
        if ($request->hasFile('rc')) {
            $document->rc = $request->file('rc')->store('truck_documents', 'public');
        }
        if ($request->hasFile('pollution')) {
            $document->pollution = $request->file('pollution')->store('truck_documents', 'public');
        }
        if ($request->hasFile('insurance')) {
            $document->insurance = $request->file('insurance')->store('truck_documents', 'public');
        }
        if ($request->hasFile('fitness_certificate')) {
            $document->fitness_certificate = $request->file('fitness_certificate')->store('truck_documents', 'public');
        }

        // Save the document
        $document->save();

        toast('Truck Updated Successfully!', 'success');
        return redirect()->route('admin.truck.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $truck = Truck::findOrFail($id);
        $truck->delete();

        toast('Truck Deleted Successfully!', 'success');
        return redirect()->route('admin.truck.index');
    }
}
