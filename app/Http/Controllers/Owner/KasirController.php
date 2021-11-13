<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Owner\Cabang;
use App\Models\Owner\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KasirController extends Controller
{
    public function index()
    {
        $store = Store::where("user_id",Auth()->user()->id)->first();
        if($store == null) {
            return view('owner.store.empty',["page" => "Daftar Kasir"]);
        }

        $kasir = User::where("store_id",$store->id)->get();
        return view('owner.kasir.index',["page" => "Daftar Kasir"],compact('kasir'));
    }

    public function create()
    {
        $store = Store::where("user_id",Auth()->user()->id)->first();
        if($store == null) {
            return view('owner.store.empty',["page" => "Daftar Kasir"]);
        }

        $cabang = Cabang::where("store_id",$store->id)->get();
        return view('owner.kasir.create',["page" => "Daftar Kasir"],compact('cabang'));
    }

    public function update($id)
    {
        $store = Store::where("user_id",Auth()->user()->id)->first();
        if($store == null) {
            return view('owner.store.empty',["page" => "Daftar Kasir"]);
        }

        $kasir = User::findOrFail($id);
        if($store->id != $kasir->store_id) {
            return back()->with(['gagal' => "Maaf, Anda tidak memiliki akses kesini"]);
        }

        $cabang = Cabang::where("store_id",$store->id)->get();
        return view('owner.kasir.update',["page" => "Daftar Kasir"],compact('cabang','kasir'));
    }

    public function delete($id)
    {
        $store = Store::where("user_id",Auth()->user()->id)->first();
        if($store == null) {
            return view('owner.store.empty',["page" => "Daftar Kasir"]);
        }

        $kasir = User::findOrFail($id);
        if($store->id != $kasir->store_id) {
            return back()->with(['gagal' => "Maaf, Anda tidak memiliki akses kesini"]);
        }

        return $this->deleteData($kasir,$id);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'  => 'required',
            'email' => 'required|unique:users,email',
            'photo' => 'mimes:jpg,jpeg,png',
            'password'  => 'required',
            'cabang_id' => 'required'
        ]);

        $store = Store::where("user_id",Auth()->user()->id)->first();

        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email; 
        $data->password = Hash::make($request->password);
        $data->cabang_id = $request->cabang_id;
        $data->store_id = $store->id;
        $request->photo ? $data->photo = $this->uploadImage($request, 'photo', 'users') : null;
        $request->jabatan ? $data->jabatan = $request->jabatan : true;
        $data->role = "kasir";
        return $this->saveData($data);
    }

    public function edit(Request $request)
    {
        $this->validate($request,[
            'name'  => 'required',
            'email' => 'required|unique:users,email,' . $request->id,
            'photo' => 'mimes:jpg,jpeg,png', 
            'cabang_id' => 'required'
        ]);
 
 
        $data = User::findOrFail($request->id);
        $data->name = $request->name;
        $data->email = $request->email; 
        $data->password = Hash::make($request->password);
        $data->cabang_id = $request->cabang_id; 
        $request->photo ? $data->photo = $this->uploadImage($request, 'photo', 'users') : null;
        $request->jabatan ? $data->jabatan = $request->jabatan : true;
        $data->role = "kasir";
        return $this->saveData($data);
    }
}
