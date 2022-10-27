<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run($name, $price, $type_id)
    {
        DB::table('products')->insert([
            "name" => $name,
            "price" => $price,
            //itt adja az ekkor felvevendo typeidt
            "type_id" => $type_id 
        ]);

    }

}
