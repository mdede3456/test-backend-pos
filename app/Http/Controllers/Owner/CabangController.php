<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\ActivityStore;
use App\Models\Owner\Cabang;
use App\Models\Owner\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CabangController extends Controller
{
    public function store(Request $request, $condition)
    {
        $this->validate($request, [
            'name'      => 'required',
            'phone'     => 'required',
            'address'   => 'required',
        ]);

        $toko = Store::where("user_id", Auth()->user()->id)->first();



        if ($condition == 'create') {
            if ($toko == null) {
                return back()->with(['gagal' => "Pengguna ini belum memiliki toko"]);
            }

            if (count($toko->cabang) >= $toko->limit) {
                return back()->with(['gagal' => "Maaf, Limit Toko Sudah mencapai batasnya"]);
            }

            $mail = true;
        }

        $condition == 'create' ? $data = new Cabang() : $data = Cabang::findOrFail($request->id);

        if ($condition == 'update') {
            if ($toko->id != $data->store_id) {
                return back()->with(['gagal' => "Maaf, Anda tidak memiliki akses untuk cabang tersebut"]);
            }

            $mail = false;
        }

        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $request->kota ? $data->kota = $request->kota : true;
        $request->provinsi ? $data->provinsi = $request->provinsi : true;
        $data->store_id = $toko->id;
        $data->save();
        
        if ($mail == true) {
            $this->activity($data, "Penambahan Cabang Baru", "Anda Menambahkan Cabang Baru Bernama " . $request->name);
        }

        return back()->with(['flash' => "Penambahan Cabang Baru Berhasil"]);
    }

    public function activity($store, $name, $description)
    {
        $activity = new ActivityStore();
        $activity->store_id = $store->id;
        $activity->name = $name;
        $activity->description = $description;
        $activity->save();
    }

    public function update($id)
    {
        $cabang = Cabang::findOrFail($id);
        $toko = Store::where("user_id", Auth()->user()->id)->first();

        if ($cabang->store_id != $toko->id) {
            return back()->with(['gagal' => "Maaf, Anda tidak memiliki akses untuk cabang tersebut"]);
        }

        return view('owner.store.cabang', ["page" => "Edit Cabang"], compact('cabang'));
    }
}
