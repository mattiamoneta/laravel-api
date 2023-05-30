<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     
        $arrCat = [
            'Personal',
            'Corporate',
            'Open'
        ];

        foreach($arrCat as $arr){
            $newRow = new Type();
            $newRow->name = $arr;
            $newRow->slug = Type::assignSlug($arr);
            $newRow->save();
        }
        
    }
}
