<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Database\Seeders\ProductSeeder;
use Database\Seeders\TypeSeeder;
use Illuminate\Support\Facades\DB;


class BakeryController extends Controller
{

    public function renderForm() {

        return view('form');
    }

    public function renderTable($name, $price, $type_id) {

        return view('table', compact($name, $price, $type_id));
    }

    public function newProduct( Request $request) {

        $productSeeder = new \Database\Seeders\ProductSeeder;
        $typeSeeder = new \Database\Seeders\TypeSeeder;

        $name = $request->name;
        $price = $request->price;
        $type = $request->type;

        $type_id = $typeSeeder->getTypeId($request, $type);
        $productSeeder->run($name, $price, $type_id);

        return redirect('/');
    }

    public function listProducts() {
        //later:model based

        $products = DB::table('products')->get();

        foreach( $products as $product ) {
            echo "<pre>";
            print_r($product->name." | ".$product->price);
        }

    }
}
