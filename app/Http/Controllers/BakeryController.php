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

        // possible fields
        $name = $request->name;
        $price = $request->price;
        $type = $request->type;

        $type_id = $typeSeeder->getTypeId($request, $type);
        $productSeeder->run($name, $price, $type_id);


        // if (DB::table('types')->where('type', $type)->doesntExist()) {

        //     $typeSeeder->run($name, $price, $type_id, $type);

        // } else {
        //     $productSeeder->run($name, $price, $type_id);

        // }
    
        return redirect('/');
    }
}
