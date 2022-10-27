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

        DB::table('types')->insert([
            "type" => $type_id
        ]);

        // ITT KELL JOIN, a megadott (text/option) 
        // a typesba, az idja a type_idba(foreignId)

                /*TODO: vizsgaljuk hogy letezik e a tipus

            van: CSAK a products tabla insert

                else: 2 insert a productsba (nameprice, type_id)
                        1 insert a typesba*/

        DB::table('products')->insert([
            "name" => $name,
            "price" => $price,
            "type_id" => $type_id 
        ]);

    }

}
