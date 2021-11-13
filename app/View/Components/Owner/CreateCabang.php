<?php

namespace App\View\Components\Owner;

use App\Models\Owner\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class CreateCabang extends Component
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
        $store = Store::where("user_id",Auth()->user()->id)->first();
        return view('components.owner.create-cabang',compact('store'));
    }
}
