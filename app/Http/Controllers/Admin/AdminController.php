<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Owner\Cabang;
use App\Models\Owner\Store;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $data = [
            'toko'  => Store::count(),
            'cabang'    => Cabang::count(),
            'owner' => User::where("role","owner")->count(),
            'kasir' => User::where("role","kasir")->count()
        ];
        return view('admin.index',["page" => "Admin Dashboard"],compact('data'));
    }

    public function notif()
    {
        $notif = Notification::where("for","admin")->where("status","no")->orderBy("id","desc")->get();
        return view('admin.notif',["page" => "Pemberitahuan Masuk"],compact('notif'));
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
        return view('admin.profile',["page" => "Update Profil"]);
    }
}
