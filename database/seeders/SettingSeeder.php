<?php

namespace Database\Seeders;

use App\Models\Admin\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'app_name'      => 'TEST BACKEND',
                'mail_notif'      => 'mdede.hidayatullah@gmail.com', 
                "logo"     => "uploads/logo.png"
            ]
        ];

        Setting::insert($data);
    }
}
