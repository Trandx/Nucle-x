<?php

namespace Database\Seeders;

use App\Models\OauthClient;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class ClientPermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = Permission::all()->pluck('id')->toArray();
        $client = OauthClient::first();

        $client->permissions()->attach($permissions);

    }
}
