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
        /*TODO: vizsgaljuk hogy letezik e a tipus*/
        DB::table('products')->insert([
            "name" => $name,
            "price" => $price,
            "type_id" => $type_id 
        ]);

    }

}
