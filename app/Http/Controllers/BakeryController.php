<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Database\Seeders\ProductSeeder;

class BakeryController extends Controller
{

    public function renderForm() {

        return view('form');
    }

    public function renderTable() {

        return view('table');
    }

    public function newProduct( Request $request) {

        $seeder = new \Database\Seeders\ProductSeeder;

        $name = $request->name;
        $price = $request->price;
        $type_id = $request->type_id;

        $seeder->run($name, $price, $type_id);

        return view('form');
    }
}
