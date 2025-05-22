<?php

namespace Database\Seeders;

use App\Models\Services;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class app2 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Services::insertOrIgnore([
            ['service_name' => 'Injection administration(IM/IV)', 'service_description' => '...'],
            ['service_name' => 'Wound Dressing', 'service_description' => '...'],
            ['service_name' => 'Iv/Drip Setup', 'service_description' => '...'],
            ['service_name' => 'Nebulization', 'service_description' => '...'],
            ['service_name' => 'Catheter Insertion/removal', 'service_description' => '...'],
            ['service_name' => 'Vital Signs Check', 'service_description' => '...'],
            ['service_name' => 'Emergency Fist Aid (with SOS)', 'service_description' => '...'],

        ]);
        //
    }
}
