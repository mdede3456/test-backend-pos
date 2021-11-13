<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::first();
        return view('admin.setting', ["page" => "Pengaturan Admin"], compact('settings'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'app_name'      => 'required',
            'mail_notif'    => 'required',
            'logo'          => 'mimes:png,jpg,jpeg'
        ]);

        $data = Setting::first();
        $data->app_name = $request->app_name;
        $data->mail_notif = $request->mail_notif;
        $request->logo ? $data->logo = $this->uploadImage($request, 'logo', 'logo/') : true;
        return $this->saveData($data);
    }
}
