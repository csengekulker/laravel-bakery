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

    public function renderTable($products) {

        return view('table', [
            'products' => $products
        ]);
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

        //TODO: nest in productseeder

        $products = DB::table('products')
            ->select('products.id', 'name', 'price', 'type')
            ->join('types', 'types.id', '=', 'products.type_id')
            ->get();

        return view('table')->with('products', $products);
        
    }
}
