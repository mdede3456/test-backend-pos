<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Owner\Cabang;
use App\Models\Owner\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
    public function index()
    {
        $store = Store::where("user_id",Auth()->user()->id)->first();
        $kasir = 0;
        $cabang = 0;

        if($store != null) {
           $kasir = User::where("role","kasir")->where("store_id",$store->id)->count();
           $cabang = Cabang::where("store_id",$store->id)->count();
        }
        $data = [
            'notif' => Notification::where("for","owner")->where("user_id",Auth()->user()->id)->count(),
            'kasir' => $kasir,
            'cabang' => $cabang
        ];
        return view('owner.index',["page" => "Owner Dashboard"],compact('data'));
    }

    public function notif()
    {
        $notif = Notification::where("status","no")->where("for","owner")->where("user_id",Auth()->user()->id)->orderBy("id","desc")->get();
        return view('owner.notif',["page" => "Pemberitahuan Masuk"],compact('notif'));
    }

    public function read($id)
    {
        $notif = Notification::findOrFail($id);
        $notif->status = "read";
        return $this->saveData($notif);
    }

    public function allread()
    { 
        Notification::where("status","no")->update(["status" => "read"]);
        return back()->with(['flash' => "Notifikasi berhasil ditandai sebagai terbaca"]);
    }

    public function myprofile()
    {
        return view('owner.profile',["page" => "Update Profil"]);
    }
 
}
