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

    public function renderTable() {

        return view('table');
    }

    public function newProduct( Request $request) {

        $productSeeder = new \Database\Seeders\ProductSeeder;
        $typeSeeder = new \Database\Seeders\TypeSeeder;

        $name = $request->name;
        $price = $request->price;
        $type_id = $request->type_id;

        // type first
        $typeSeeder->run($type_id);

        $productSeeder->run($name, $price, $type_id);

        return view('form');
    }

    public function insertId(Request $request) {

        $name = $request->name;
        $price = $request->price;
        $type_id = $request->type_id;

        $stored_typeid = DB::table('types')->insertGetId([
            'type' => $type_id
        ]);

        if (DB::table('types')->where('type', $type_id)->doesntExist()) {
            DB::table('products')->insert([
                'name' => $name,
                'price' => $price,
                'type_id' => $stored_typeid
            ]);
        } else { 
            // type exists
            DB::table('products')->insert([
                'name' => $name,
                'price' => $price,
                'type_id' => $type_id
            ]);
        }
    }
}
