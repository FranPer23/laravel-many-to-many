<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Technology;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker  $faker)
    {
        for ($i = 0; $i < 5; $i++) {
            $technology = new Technology();
            $technology->name = $faker->unique()->word();
            $technology->slug = Str::slug($technology->name, '-');
            $technology->save();
        }
    }
}
