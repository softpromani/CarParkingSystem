<?php
namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ThirdPartyController extends Controller
{
    public function thirdPartyApi($config = null)
    {
        $data = getBusinessSetting($config);
        $page = $config;
        return view('admin.setting.third-party', compact('data', 'page'));
    }
    public function thirdPartyApiPost(Request $request)
    {
        $type = $request->type;

        $value = json_encode($request->except('_token'));

        $data = updateBusinessSetting($type, $value);

        if ($data === true) {
            toast('Data updated successfully', 'success');
        } else {
            toast('Something went wrong!', 'error');

        }

        return redirect()->back();
    }
}
