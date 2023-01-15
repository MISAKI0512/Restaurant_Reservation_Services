<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # 管理者
        User::insert(
            [
                'name'    => '管理者',
                'email' => 'admin@example.com',
                'email_verified_at' => now(),
                'role' => '99',
                'password' => Hash::make('142857'),
                
        ]);

        User::factory()->count(20)->create();
    }
}
