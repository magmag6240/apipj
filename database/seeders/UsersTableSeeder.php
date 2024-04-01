<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $param = [
            'name' => 'test1',
            'email' => 'test1@example.com',
            'password' => Hash::make('password')
        ];
        $user = new User;
        $user->fill($param)->save();
        $param = [
            'name' => 'test2',
            'email' => 'test2@example.com',
            'password' => Hash::make('password')
        ];
        $user = new User;
        $user->fill($param)->save();
        $param = [
            'name' => 'test3',
            'email' => 'test3@example.com',
            'password' => Hash::make('password')
        ];
        $user = new User;
        $user->fill($param)->save();
    }
}
