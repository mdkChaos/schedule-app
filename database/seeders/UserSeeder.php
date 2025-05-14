<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::where('name', 'Super Admin')->first();

        User::firstOrCreate(
            ['login' => 'Super Admin'],
            [
                'password' => Hash::make('admin123'),
                'role_id' => $role->id,
            ]
        );
    }
}
