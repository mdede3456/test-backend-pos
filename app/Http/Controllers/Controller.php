<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function saveData($data)
    {
        if ($data->save()) {
            return back()->with(['flash' => "Perubahan data berhasil dilakukan"]);
        } else {
            return back()->with(['flash' => "Terjadi kesalahan tidak diketahui"]);
        }
    }

    
    public function uploadImage(Request $request, $name, $path)
    {
        if ($request->hasFile($name)) {
            return $request->file($name)->store('uploads/' . $path . '/');
        }
    }

    public function deleteData($data, $id)
    {
        if ($data->delete($id)) {
            return back()->with(['flash' => "Penghapusan data berhasil dilakukan"]);
        } else {
            return back()->with(['gagal' => "Terjadi kesalahan tidak diketahui"]);
        }
    }

    public function profile(Request $request)
    {
        $this->validate($request,[
            'name'  => 'required',
            'email' => 'required|unique:users,email,' . Auth::user()->id,
            'photo' => 'mimes:jpg,jpeg,png',
        ]);
 
        $data = User::findOrFail(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email; 
        $request->photo ? $data->photo = $this->uploadImage($request, 'photo', 'users') : null;
        $request->jabatan ? $data->jabatan = $request->jabatan : true;
        return $this->saveData($data);
    }

    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'password'  => 'required',
            'confirm' => 'required',
        ]);

        if ($request->password != $request->confirm) {
            return back()->with(['gagal' => "Password & Konfirmasi Password Harus Sama"]);
        }

        $data = User::findOrFail(Auth::user()->id);
        $data->password = Hash::make($request->password);
        return $this->saveData($data);
    }

}
