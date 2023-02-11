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
            ['id' => '1', 'name' => 'コースA','price' => '5000','shop_id'=>'1' ],
            ['id' => '2', 'name' => 'コースB', 'price' => '6000', 'shop_id' => '1'],
            ['id' => '3', 'name' => 'コースC', 'price' =>'7000', 'shop_id' => '1'],
            ['id' => '4', 'name' => 'コースA', 'price' => '5000', 'shop_id' => '2'],
            ['id' => '5', 'name' => 'コースB', 'price' => '6000', 'shop_id' => '2'],
            ['id' => '6', 'name' => 'コースC', 'price' => '7000', 'shop_id' => '2'],
            ['id' => '7', 'name' => 'コースA', 'price' => '5000', 'shop_id' => '3'],
            ['id' => '8', 'name' => 'コースB', 'price' => '6000', 'shop_id' => '3'],
            ['id' => '9', 'name' => 'コースC', 'price' => '7000', 'shop_id' => '3'],
            ['id' => '10', 'name' => 'コースA', 'price' => '5000', 'shop_id' => '4'],
            ['id' => '11', 'name' => 'コースB', 'price' => '6000', 'shop_id' => '4'],
            ['id' => '12', 'name' => 'コースC', 'price' => '7000', 'shop_id' => '4'],
            ['id' => '13', 'name' => 'コースA', 'price' => '5000', 'shop_id' => '5'],
            ['id' => '14', 'name' => 'コースB', 'price' => '6000', 'shop_id' => '5'],
            ['id' => '15', 'name' => 'コースC', 'price' => '7000', 'shop_id' => '5'],
            ['id' => '16', 'name' => 'コースA', 'price' => '5000', 'shop_id' => '6'],
            ['id' => '17', 'name' => 'コースB', 'price' => '6000', 'shop_id' => '6'],
            ['id' => '18', 'name' => 'コースC', 'price' => '7000', 'shop_id' => '6'],
            ['id' => '19', 'name' => 'コースA', 'price' => '5000', 'shop_id' => '7'],
            ['id' => '20', 'name' => 'コースB', 'price' => '6000', 'shop_id' => '7'],
            ['id' => '21', 'name' => 'コースC', 'price' => '7000', 'shop_id' => '7'],
            ['id' => '22', 'name' => 'コースA', 'price' => '5000', 'shop_id' => '8'],
            ['id' => '23', 'name' => 'コースB', 'price' => '6000', 'shop_id' => '8'],
            ['id' => '24', 'name' => 'コースC', 'price' => '7000', 'shop_id' => '8'],
            ['id' => '25', 'name' => 'コースA', 'price' => '5000', 'shop_id' => '9'],
            ['id' => '26', 'name' => 'コースB', 'price' => '6000', 'shop_id' => '9'],
            ['id' => '27', 'name' => 'コースC', 'price' => '7000', 'shop_id' => '9'],
            ['id' => '28', 'name' => 'コースA', 'price' => '5000', 'shop_id' => '10'],
            ['id' => '29', 'name' => 'コースB', 'price' => '6000', 'shop_id' => '10'],
            ['id' => '30', 'name' => 'コースC', 'price' => '7000', 'shop_id' => '10'],
            ['id' => '31', 'name' => 'コースA', 'price' => '5000', 'shop_id' => '11'],
            ['id' => '32', 'name' => 'コースB', 'price' => '6000', 'shop_id' => '11'],
            ['id' => '33', 'name' => 'コースC', 'price' => '7000', 'shop_id' => '11'],
            ['id' => '34', 'name' => 'コースA', 'price' => '5000', 'shop_id' => '12'],
            ['id' => '35', 'name' => 'コースB', 'price' => '6000', 'shop_id' => '12'],
            ['id' => '36', 'name' => 'コースC', 'price' => '7000', 'shop_id' => '12'],
            ['id' => '37', 'name' => 'コースA', 'price' => '5000', 'shop_id' => '13'],
            ['id' => '38', 'name' => 'コースB', 'price' => '6000', 'shop_id' => '13'],
            ['id' => '39', 'name' => 'コースC', 'price' => '7000', 'shop_id' => '13'],
            ['id' => '40', 'name' => 'コースA', 'price' => '5000', 'shop_id' => '14'],
            ['id' => '41', 'name' => 'コースB', 'price' => '6000', 'shop_id' => '14'],
            ['id' => '42', 'name' => 'コースC', 'price' => '7000', 'shop_id' => '14'],
            ['id' => '43', 'name' => 'コースA', 'price' => '5000', 'shop_id' => '15'],
            ['id' => '44', 'name' => 'コースB', 'price' => '6000', 'shop_id' => '15'],
            ['id' => '45', 'name' => 'コースC', 'price' => '7000', 'shop_id' => '15'],
            ['id' => '46', 'name' => 'コースA', 'price' => '5000', 'shop_id' => '16'],
            ['id' => '47', 'name' => 'コースB', 'price' => '6000', 'shop_id' => '16'],
            ['id' => '48', 'name' => 'コースC', 'price' => '7000', 'shop_id' => '16'],
            ['id' => '49', 'name' => 'コースA', 'price' => '5000', 'shop_id' => '17'],
            ['id' => '50', 'name' => 'コースB', 'price' => '6000', 'shop_id' => '17'],
            ['id' => '51', 'name' => 'コースC', 'price' => '7000', 'shop_id' => '17'],
            ['id' => '52', 'name' => 'コースA', 'price' => '5000', 'shop_id' => '18'],
            ['id' => '53', 'name' => 'コースB', 'price' => '6000', 'shop_id' => '18'],
            ['id' => '54', 'name' => 'コースC', 'price' => '7000', 'shop_id' => '18'],
            ['id' => '55', 'name' => 'コースA', 'price' => '5000', 'shop_id' => '19'],
            ['id' => '56', 'name' => 'コースB', 'price' => '6000', 'shop_id' => '19'],
            ['id' => '57', 'name' => 'コースC', 'price' => '7000', 'shop_id' => '19'],
            ['id' => '58', 'name' => 'コースA', 'price' => '5000', 'shop_id' => '20'],
            ['id' => '59', 'name' => 'コースB', 'price' => '6000', 'shop_id' => '20'],
            ['id' => '60', 'name' => 'コースC', 'price' => '7000', 'shop_id' => '20'],

        ]);
    }
}
