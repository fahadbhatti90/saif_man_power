<?php

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'company_name' => 'Appflex Technology',
            'company_email' => 'hr@appflextech.com',
            'phone_no' => '5712495567',
            'address' => 'Mingora',
            'logo' => '',
            'status' => 'active',
        ]);
    }
}
