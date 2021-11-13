<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\Admin\CreateStore;
use App\Models\ActivityStore;
use App\Models\Admin\Setting;
use App\Models\Notification;
use App\Models\Owner\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class StoreController extends Controller
{

    public function index()
    {
        $store = Store::where("user_id",Auth()->user()->id)->first();
        if($store == null) {
            $response = [
                'pesan' => "Anda Belum Memiliki Toko",
                'status'    => 'gagal'
            ];

            return response($response, 201);
            
        }

        $response = [
            'pesan' => $store,
            'status'    => 'berhasil'
        ];

        return response($response, 201);
    }

    public function store(Request $request)
    { 

        $this->validate($request,[
            'name'  => "required",
            "phone" => "required",
            "address"   => 'required'
        ]);

        $toko = Store::where("user_id",Auth()->user()->id)->first();

        if($toko != null) {
            $id = $toko->id;
            $store = Store::findOrFail($id); 

            $mail = false;
        } else {
            $store = new Store();
            $store->join = date("Y-m-d");
            $store->limit = 0;
            $store->masa_active = 0;

            $mail = true;
        }

        $store->name = $request->name;
        $store->phone = $request->phone;
        $store->address = $request->address;
        $store->user_id = Auth()->user()->id;
        $request->kota ? $store->kota = $request->kota : true;
        $request->provinsi ? $store->provinsi = $request->provinsi : true;
        $store->save();

        if($mail == true) {
            $this->mailsending($store);
        } else {
            $this->activity($store);
        }

        $response = [
            'pesan' => $store,
            'status'    => 'berhasil'
        ];

        return response($response, 201);
    }

    public function mailsending($store)
    {
        $settings = Setting::first();
        Mail::to($settings->mail_notif)->send(new CreateStore($store));

        $activity = new ActivityStore();
        $activity->store_id = $store->id;
        $activity->name     = "Toko Dibuat";
        $activity->description = "Toko berhasil di buat pada tanggal ".date("Y-m-d")." dengan nama " . $store->name;
        $activity->save();

        $notification = new Notification();
        $notification->type = "store";
        $notification->for = "admin";
        $notification->store_id = $store->id;
        $notification->name     = "Pembuatan Toko Baru";
        $notification->description = "Toko Perlu ditinjau dengan nama " . $store->name;
        $notification->save();
    }

    public function activity($store)
    {
        $activity = new ActivityStore();
        $activity->store_id = $store->id;
        $activity->name     = "Toko Berhasil Diperbaharui";
        $activity->description = "Toko berhasil di perbaharui pada tanggal ".date("Y-m-d");
        $activity->save();
    }
}
