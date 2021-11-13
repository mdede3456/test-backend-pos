<?php

namespace App\View\Components\Admin;

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
        $notif = Notification::where("for","admin")->where("status","no")->orderBy("id","desc")->limit(10)->get();
        return view('components.admin.header-component',compact('setting','notif'));
    }
}
