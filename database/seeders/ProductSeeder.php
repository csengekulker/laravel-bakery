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
            "type_id" => $type_id 
        ]);

        // ITT KELL JOIN

        // vizsgal hogy letezik e a bevitt type es
        // mikor, az uj rekord feltoltes utani atiranyitas utan
        // bovitjuk a tipus dropdownt
        
        DB::table('types')->insert([
            "type" => $type_id
        ]);

        // DB::table('products')->insert([
        //     "name" => "Teszt Adat",
        //     "price" => 420240,
        //     "type_id" => 3
        // ]);
    }

    public function test($type_id) {

        $result = DB::table('types')->select('type as TP')->get();

        echo "<pre>";
        print_r($result);

        if ($type_id == $result) {
            echo "vanilyen";
        }
    }
}
