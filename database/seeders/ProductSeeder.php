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
    public function insertProduct($name, $price, $type_id)
    {
        $products = DB::table('products');

        $products->insert([
            'name' => $name,
            'price' => $price,
            'type_id' => $type_id
        ]);
    }

    public function selectProducts () {
        
        $products = DB::table('products')
        ->select('products.id', 'name', 'price', 'type')
        ->join('types', 'types.id', '=', 'products.type_id')
        ->get();

        return $products;
    }

    public function selectProductById() {

        $product = DB::table('products')
        ->select('products.id', 'name', 'price', 'type')
        ->where('products.id', 3)
        ->join('types', 'types.id', '=', 'products.type_id')
        ->get();

        return $product;
    }

}
