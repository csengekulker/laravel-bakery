<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Database\Seeders\ProductSeeder;
use Database\Seeders\TypeSeeder;

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

        $productSeeder->run($name, $price, $type_id);

        $typeSeeder->run($type_id);

        return view('form');
    }
}
