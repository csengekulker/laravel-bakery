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

    private function getTypeId(Request $request) {

        // mar letezo tipus eseten

        $types = DB::table('types');

        $types->updateOrInsert(
            ['type' => $request->type]
        );

        $type_id = $types
        ->where('type', $request->type)
        ->value('id');

        return $type_id;
    }

    public function insertId(Request $request) {
        $types = DB::table('types');
        $products = DB::table('products');

        $type_id = $this->getTypeId($request);

        $name = $request->name;
        $price = $request->price;
        $type = $request->type;

        // ha nincs meg ilyen
        if ($types->where('type', $type)->doesntExist()) {

            $stored = $types->insertGetId([
                'type' => $type
            ]);

            $products->insert([
                'name' => $name,
                'price' => $price,
                'type_id' => $stored
            ]);

        } else {
            $products->insert([
                'name' => $name,
                'price' => $price,
                'type_id' => $type_id
            ]);
        }
    
        return redirect('/');

    }
}
