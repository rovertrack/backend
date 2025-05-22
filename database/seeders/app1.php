<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class app1 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('service_type')->insertOrIgnore([
            ['name' => 'Instant Booking'],
            ['name' => "Long term Booking"],
        ]);
       

        //
    }
}
