<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index()
    {
        if (Auth::check() != null) {
            return redirect()->route('redirect');
        } 

        return view('auth.login', ['page' => __('signin')], compact('data'));
    }

    public function redirect()
    {

        if (Auth::check() != null) {
            if(Auth()->user()->role == 'admin') {
                return redirect()->route("admin.dashboard");
            } else {
                if(Auth()->user()->role == 'owner') {
                    return redirect()->route('owner.dashboard');
                }

                if(Auth()->user()->role == 'kasir') {
                    return redirect()->route('kasir.dashboard');
                }
            }
             
            return redirect()->route('login');
        }
    }

    public function updateprofile(Request $request)
    {
        return $this->profile($request);
    }

    public function password(Request $request)
    {
        return $this->changePassword($request);
    }

}
