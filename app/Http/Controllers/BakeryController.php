<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Database\Seeders\DatabaseSeeder;

class BakeryController extends Controller
{
    public function renderForm() {

        return view('form');
    }

    public function renderTable() {

        return view('table');
    }

    public function newProduct( Request $request) {

        // $this->call([
        //     DatabaseSeeder::class
        // ]);
        
        echo "felvettem";
    }
}
