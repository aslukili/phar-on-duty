<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'all'])->assignRole('admin');
        Permission::create(['name' =>'manage-pharmacies'])->assignRole('city_admin');
        Permission::create(['name' =>'manage-guard-pharmacies'])->assignRole('city_admin');
    }
}
