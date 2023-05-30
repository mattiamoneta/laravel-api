<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = ['PHP','JavaScript','Laravel','VueJS','React','HTML','CSS'];

        foreach($arr as $element){
            $newTech = new Technology();
            $newTech->name = $element;
            $newTech->save();
        }
    }
}
