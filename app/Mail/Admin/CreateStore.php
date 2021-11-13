<?php

namespace App\Mail\Admin;

use App\Models\Admin\Setting;
use App\Models\Owner\Store;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CreateStore extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $store;
    public function __construct(Store $store)
    {
        $this->store = $store;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $settings = Setting::first();
        return $this->from(env('MAIL_FROM_ADDRESS'))
            ->view('mail.admin.store_create', compact('settings'))
            ->subject('Toko Perlu Ditinjau');
    }
}
