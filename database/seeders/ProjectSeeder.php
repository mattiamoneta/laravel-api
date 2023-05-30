<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0; $i<30;$i++){

            $itemTitle = $faker->sentence(2);;

            $newProject = new Project();
            $newProject->name = $itemTitle;
            $newProject->description = $faker->sentence(10);
            $newProject->thumb = "user_uploads/8kPOER35rDHBx7nPXj4Js1qvNwGjWonhF7KgieuG.jpg";
            $newProject->slug = Project::assignSlug($itemTitle);
            $newProject->save();
        }
    }
}
