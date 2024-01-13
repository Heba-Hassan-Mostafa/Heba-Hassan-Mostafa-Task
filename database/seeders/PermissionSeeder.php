<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $createUser = new Permission();
        $createUser->name = 'Create users';
        $createUser->save();

        $editUser = new Permission();
        $editUser->name = 'Edit Users';
        $editUser->save();
    }
}