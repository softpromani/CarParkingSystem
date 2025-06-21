<?php
namespace App\Http\Controllers\admin;

use App\Models\SocialMedia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $socialMedia = SocialMedia::get();
        return view('admin.setting.social-media', compact('socialMedia'));
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
            'name' => 'required|string|unique:social_media,name',
            'link' => 'required',
        ]);

        $data = [

            'name' => $request->name,
            'link' => $request->link,
        ];

        $socialmedia = SocialMedia::create($data);
        if ($socialmedia) {
            toast('Social links added successfully', 'success');
        } else {
            toast('Something went wrong!', 'error');
        }
        return redirect()->route('admin.social-media.index');
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
        $socialMedia     = SocialMedia::get();
        $editsocialmedia = SocialMedia::find($id);
        return view('admin.setting.social-media', compact('socialMedia', 'editsocialmedia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [

            'name' => $request->name,
            'link' => $request->link,
        ];

        $socialmedia = SocialMedia::find($id)->update($data);
        if ($socialmedia) {
            toast('Social links updated successfully', 'success');
        } else {
            toast('Something went wrong!', 'error');
        }
        return redirect()->route('admin.social-media.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $media = SocialMedia::findOrFail($id);
        $media->delete();

        toast('Social Link Deleted Successfully!', 'success');
        return redirect()->route('admin.social-media.index');
    }
}
