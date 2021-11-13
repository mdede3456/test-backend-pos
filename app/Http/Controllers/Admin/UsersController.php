<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function admin()
    {
        $admin = User::where("role","admin")->orderBy("name","asc")->get();
        return view('admin.user.admin',["page" => "Data Admin"],compact('admin'));
    }

    public function create_admin()
    {
        return view('admin.user.create_admin',["page" => "Tambah Admin"]);
    }

    public function update_admin($id)
    {
        $admin = User::findOrFail($id);
        return view('admin.user.update_admin',["page" => "Edit Admin"],compact('admin'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'  => 'required',
            'email' => 'required|unique:users,email',
            'photo' => 'mimes:jpg,jpeg,png',
            'password'  => 'required'
        ]);
 
        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email; 
        $data->password = Hash::make($request->password);
        $request->photo ? $data->photo = $this->uploadImage($request, 'photo', 'users') : null;
        $request->jabatan ? $data->jabatan = $request->jabatan : true;
        $data->role = "admin";
        return $this->saveData($data);
    }

    public function edit(Request $request)
    {
        $this->validate($request,[
            'name'  => 'required',
            'email' => 'required|unique:users,email,' . $request->id,
            'photo' => 'mimes:jpg,jpeg,png', 
        ]);
 
        $data = User::findOrFail($request->id);
        $data->name = $request->name;
        $data->email = $request->email; 
        $request->password ? $data->password = Hash::make($request->password) : null;
        $request->photo ? $data->photo = $this->uploadImage($request, 'photo', 'users') : null;
        $request->jabatan ? $data->jabatan = $request->jabatan : true;
        return $this->saveData($data);
    }

    public function delete($id)
    {
        $admin = User::findOrFail($id);
        return $this->deleteData($admin,$id);
    }

    public function owner()
    {
        $owner = User::where("role","owner")->orderBy("name","asc")->get();
        return view('admin.user.owner',["page" => "Data Owner"],compact('owner'));
    }

    public function kasir()
    {
        $kasir = User::where("role","kasir")->orderBy("name","asc")->get();
        return view('admin.user.kasir',["page" => "Data Kasir"],compact('kasir'));
    }
}
