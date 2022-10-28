<?php

namespace Database\Seeders;

use Illuminate\Http\Request;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
    }   

    public function getTypeId(Request $request, $type) {

        $types = DB::table('types');

        $types->updateOrInsert(
            ['type' => $type]
        );

        $type_id = $types
        ->where('type', $type)
        ->value('id');

        return $type_id;
    }
    
}
