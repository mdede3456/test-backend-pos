<?php

namespace App\View\Components\Kasir;

use App\Models\Admin\Setting;
use App\Models\Notification;
use Illuminate\View\Component;

class HeaderComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $setting = Setting::first();
        $notif = Notification::where("status","no")->where("for","kasir")->where("user_id",Auth()->user()->id)->orderBy("id","desc")->limit(10)->get();
        return view('components.kasir.header-component',compact('setting','notif'));
    }
}
