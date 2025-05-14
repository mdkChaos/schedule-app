<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'User', 'level' => 1],
            ['name' => 'Manager', 'level' => 100],
            ['name' => 'Admin', 'level' => 200],
            ['name' => 'Super Admin', 'level' => 255],
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(
                ['name' => $role['name']],
                ['level' => $role['level']]
            );
        }
    }
}
