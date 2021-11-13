<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ActivityStore;
use App\Models\Owner\Cabang;
use App\Models\Owner\Store;
use Illuminate\Http\Request;

class CabangController extends Controller
{
    public function index()
    {
        $store = Store::where("user_id",Auth()->user()->id)->first();

        if($store == null) {
            $response = [
                'pesan' => "Anda Belum Memiliki Toko,Silahkan buat toko terlebih dahulu",
                'status'    => 'gagal'
            ];

            return response($response, 201);
        }

        $cabang = Cabang::where("store_id",$store->id)->get();

        $response = [
            'pesan' => $cabang,
            'status'    => 'berhasil'
        ];
        
        return response($response, 201);

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required',
            'phone'     => 'required',
            'address'   => 'required',
        ]);

        $toko = Store::where("user_id", Auth()->user()->id)->first();

        if ($toko == null) {
            $response = [
                'pesan' => "Anda Belum Memiliki Toko, Silahkan Buat Toko Terlebih dahulu",
                'status'    => 'gagal'
            ];

            return response($response, 201);
        }

        if (count($toko->cabang) >= $toko->limit) { 
            $response = [
                'pesan' => "Maaf, Limit Toko Sudah mencapai batasnya",
                'status'    => 'gagal'
            ];

            return response($response, 201);
        }

        $data = new Cabang(); 
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $request->kota ? $data->kota = $request->kota : true;
        $request->provinsi ? $data->provinsi = $request->provinsi : true;
        $data->store_id = $toko->id;
        $data->save();
        
        $this->activity($data, "Penambahan Cabang Baru", "Anda Menambahkan Cabang Baru Bernama " . $request->name);

        $response = [
            'pesan' => $data,
            'status'    => 'berhasil'
        ];

        return response($response, 201);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'      => 'required',
            'phone'     => 'required',
            'address'   => 'required',
        ]);

        $toko = Store::where("user_id", Auth()->user()->id)->first();
        $data = Cabang::findOrFail($id);
        if ($toko->id != $data->store_id) {
            $response = [
                'pesan' => "Maaf, Anda Tidak memiliki akses untuk edit data ini",
                'status'    => 'gagal'
            ];

            return response($response, 201);
        }
 
 
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $request->kota ? $data->kota = $request->kota : true;
        $request->provinsi ? $data->provinsi = $request->provinsi : true;
        $data->store_id = $toko->id;
        $data->save();
         
        $response = [
            'pesan' => $data,
            'status'    => 'berhasil'
        ];

        return response($response, 201);
    }

    public function activity($store, $name, $description)
    {
        $activity = new ActivityStore();
        $activity->store_id = $store->id;
        $activity->name = $name;
        $activity->description = $description;
        $activity->save();
    }
}
