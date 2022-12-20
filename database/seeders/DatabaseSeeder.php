<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AreasTableSeeder::class);
        $this->call(GenresTableSeeder::class);
        $this->call(LikesTableSeeder::class);
        $this->call(ReservationsTableSeeder::class);
        $this->call(ShopsTableSeeder::class);
    }
}
