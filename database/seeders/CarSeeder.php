<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->delete();
        $brands = [
            ['name' => 'Honda'],
            ['name' => 'Suzuki'],
            ['name' => 'Toyota'],
            ['name' => 'Nissan'],
            ['name' => 'Audi']
        ];
        DB::table('brands')->insert($brands);
    }
}
