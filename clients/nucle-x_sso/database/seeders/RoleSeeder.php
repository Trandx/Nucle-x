<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => config('global.client_admin_role.admin'),
                'description' => "user can administrate his sso session",
            ],
            [
                'name' => config('global.client_admin_role.super_admin'),
                'description' => "user can administrate all sso",
            ],
       ];

       foreach ($roles as $role) {
            Role::create([
                'name' => $role["name"],
                'description' => $role["description"],
            ]);
        }
    }
}
