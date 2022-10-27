<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run($type_id)

    {
        
        if ( DB::table('types')->where('type', $type_id)->doesntExist()) {
            DB::table('types')->insert([
                "type" => $type_id
            ]);
        }

        
    }
}
