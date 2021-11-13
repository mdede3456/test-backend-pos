<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class KasirController extends Controller
{
    public function index()
    {
        
        return view('kasir.index',["page" => "Kasir Dashboard"]);
    }

    public function notif()
    {
        $notif = Notification::where("status","no")->where("for","kasir")->where("user_id",Auth()->user()->id)->orderBy("id","desc")->get();
        return view('kasir.notif',["page" => "Pemberitahuan Masuk"],compact('notif'));
    }

    public function read($id)
    {
        $notif = Notification::findOrFail($id);
        $notif->status = "read";
        return $this->saveData($notif);
    }

    public function allread()
    { 
        Notification::where("for","kasir")->where("status","no")->update(["status" => "read"]);
        return back()->with(['flash' => "Notifikasi berhasil ditandai sebagai terbaca"]);
    }

    public function myprofile()
    {
        return view('kasir.profile',["page" => "Update Profil"]);
    }
}
