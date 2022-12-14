<?php

namespace Database\Seeders;

use App\Models\Role;
//use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = Role::all()->pluck('id')->toArray();
        $user = User::first();

        $user->roles()->attach($roles, ["created_at" => now(), "updated_at" => now()]);
        // echo($user->id);
        // foreach ($roles as $role) {

        //     RoleUser::create([
        //         'user_id' => $user->id,
        //         'role_id' => $role->id,
        //     ]);
        // }
    }
}
