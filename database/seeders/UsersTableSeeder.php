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
                'id' => '1',
                'name'    => '管理者',
                'email' => 'admin@example.com',
                'email_verified_at' => now(),
                'role' => '99',
                'password' => Hash::make('password'),
        ]);

        # 店舗責任者
        User::insert(
            [
                'id' => '2',
                'name'    => '店舗責任者サンプル',
                'email' => 'shopAdmin@example.com',
                'email_verified_at' => now(),
                'role' => '1',
                'password' => Hash::make('password'),
            ]
        );

        User::factory()->count(19)->create();

        # テストユーザー
        User::insert(
            [
                'id' => '22',
                'name'    => 'ユーザーサンプル',
                'email' => 'user@example.com',
                'email_verified_at' => now(),
                'role' => '0',
                'password' => Hash::make('password'),
            ]
        );
    }
}
