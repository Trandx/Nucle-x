<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'name' => "create",
                'default' => true,
                'description' => "permission to create some thing",
            ],
            [
                'name' => "update",
                'default' => true,
                'description' => "permission to update some thing",
            ],
            [
                'name' => "delete",
                'default' => true,
                'description' => "permission to delete some thing",
            ],
            [
                'name' => "update_user_password",
                'default' => true,
                'description' => "permission to update user password",
            ],
            [
                'name' => "*",
                'default' => true,
                'description' => "all permission",
            ],
       ];
            foreach ($permissions as  $value) {
                Permission::create($value);
            }


    }
}
