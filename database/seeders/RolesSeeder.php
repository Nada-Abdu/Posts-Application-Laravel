<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Enums\UserRoles;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole =  Role::firstOrCreate([
            'name' => UserRoles::Admin,
        ]);

        $userRole = Role::firstOrCreate([
            'name' => UserRoles::User,
        ]);
    }
}
