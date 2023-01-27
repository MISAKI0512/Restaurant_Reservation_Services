<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::insert([
            ['id' => '1', 'name' => 'コースA','price' => '5000'],
            ['id' => '2', 'name' => 'コースB', 'price' => '6000'],
            ['id' => '3', 'name' => 'コースC', 'price' => '7000'],
        ]);
    }
}
