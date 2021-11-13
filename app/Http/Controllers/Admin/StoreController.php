<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Owner\AddActive;
use App\Mail\Owner\AddLimit;
use App\Mail\Owner\ApprovalStore;
use App\Models\ActivityStore;
use App\Models\Notification;
use App\Models\Owner\Cabang;
use App\Models\Owner\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class StoreController extends Controller
{

    public function pending()
    {
        $store = Store::where("status", "tidak")->orderBy("id", "desc")->get();
        return view('admin.store.pending', ["page" => "Pending Store"], compact('store'));
    }

    public function index()
    {
        $store = Store::where("status", "active")->orderBy("id", "desc")->get();
        return view('admin.store.index', ["page" => "Active Store"], compact('store'));
    }

    public function approval(Request $request)
    {
        $this->validate($request, [
            'id'    => 'required',
            'limit' => 'required',
            'day'   => 'required'
        ]);

        $store = Store::findOrFail($request->id);
        $store->limit = $request->limit;
        $store->status = 'active';

        $day = date('Y-m-d');
        $store->masa_active = date('Y-m-d', strtotime($day . ' + ' . $request->day . ' days'));
        $store->save();

        $this->notification($store);
        $this->activity($store, "Approval Toko", "Toko Anda Dengan nama " . $store->name . " telah disetujui dan siap digunakan");
        return back()->with(['flash' => 'Approval Toko Berhasil']);
    }

    public function notification($store)
    {
        Mail::to($store->owner->email)->send(new ApprovalStore($store));

        // Send Notification 
        $notif = new Notification();
        $notif->type = "store";
        $notif->for = "owner";
        $notif->user_id = $store->owner->id;
        $notif->store_id = $store->id;
        $notif->name = "Toko Berhasil Disetujui";
        $notif->description = "Toko Anda Dengan nama " . $store->name . " telah disetujui dan siap digunakan";
        $notif->save();
    }

    public function activity($store, $name, $description)
    {
        $activity = new ActivityStore();
        $activity->store_id = $store->id;
        $activity->name = $name;
        $activity->description = $description;
        $activity->save();
    }

    public function detail($id)
    {
        $store = Store::findOrFail($id);
        return view('admin.store.detail', ["page" => "Detail Toko - " . $store->name], compact('store'));
    }

    public function addlimit(Request $request)
    {
        $this->validate($request, [
            'limit' => 'required'
        ]);

        $store = Store::findOrFail($request->id);
        $store->limit = $store->limit + $request->limit;
        $store->save();
        $this->activity($store, "Penambahan Limit Cabang", "Toko Anda Mendapatkan Penambahan Limit Cabang Sebanyak " . $request->limit);
        $this->sendNotif($store, "limit", "Penambahan Limit Cabang", "Toko Anda Mendapatkan Penambahan Limit Cabang Sebanyak " . $request->limit);
        return back()->with(['flash' => "Penambahan Limit Cabang Berhasil"]);
    }

    public function addactive(Request $request)
    {
        $this->validate($request, [
            'day' => 'required'
        ]);

        $store = Store::findOrFail($request->id);
        $day = $store->masa_active;
        $store->masa_active = date('Y-m-d', strtotime($day . ' + ' . $request->day . ' days'));
        $store->save();
        $this->activity($store, "Penambahan Masa Aktif", "Toko Anda Mendapatkan Penambahan Masa Aktive Sabanyak " . $request->day." hari");
        $this->sendNotif($store, "active", "Penambahan Masa Aktif", "Toko Anda Mendapatkan Penambahan Masa Aktive Sabanyak " . $request->day." hari");
        return back()->with(['flash' => "Penambahan Masa Aktif Berhasil"]);
    }

    public function sendNotif($store, $type, $name, $description)
    {
        if ($type == 'limit') {
            Mail::to($store->owner->email)->send(new AddLimit($store));

            // Send Notification 
            $notif = new Notification();
            $notif->type = "store";
            $notif->for = "owner";
            $notif->user_id = $store->owner->id;
            $notif->store_id = $store->id;
            $notif->name = $name;
            $notif->description = $description;
            $notif->save();
        }

        if($type == 'active') {
            Mail::to($store->owner->email)->send(new AddActive($store));

            // Send Notification 
            $notif = new Notification();
            $notif->type = "store";
            $notif->for = "owner";
            $notif->user_id = $store->owner->id;
            $notif->store_id = $store->id;
            $notif->name = $name;
            $notif->description = $description;
            $notif->save();
        }
    }

    public function create()
    {
        $user = User::where("role","owner")->orderBy("name","asc")->get();
        return view('admin.store.create',["page" => "Tambah Toko"],compact('user'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'  => "required",
            "phone" => "required",
            "user_id" => 'required',
            'limit' => 'required',
            'day'   => 'required',
            "address"   => 'required'
        ]);

        $toko = Store::where("user_id",$request->user_id)->first();

        if($toko != null) {
           return back()->with(["gagal" => "Maaf Pengguna ini telah memiliki toko sebelumnya" ]);
        }  
 
        $date = date("Y-m-d");
        $store = new Store();
        
        $store->join = $date;
        $store->limit = $request->limit; 
        $store->masa_active = date('Y-m-d', strtotime($date . ' + ' . $request->day . ' days')); 
        $store->name = $request->name;
        $store->phone = $request->phone;
        $store->address = $request->address;
        $store->user_id = $request->user_id;
        $request->kota ? $store->kota = $request->kota : true;
        $request->provinsi ? $store->provinsi = $request->provinsi : true;
        $store->save();

        $this->activity($store,"Toko Berhasil Dibuat & Diaktifkan","Toko berhasil di buat & diaktifkan pada tanggal ".date("Y-m-d"));
        $this->notification($store);

        return back()->with(['flash' => "Toko Berhasil Dibuat"]);
    }

    public function cabang()
    {
        $cabang = Cabang::orderBy("id","desc")->get();
        return view('admin.store.cabang',["page" => "Data Cabang"],compact('cabang'));
    }

    
}
