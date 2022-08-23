<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OauthClientsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = [
            "id" => "970e9117-20b5-4bc2-87ce-f7585d39d763",
            "name" => env("APP_NAME"),
            "secret" => "7QkpMn0ToWOBjp53MGN62MAS7tV7z8TefW5FjZzA",
            "redirect" => "http://localhost",
            "personal_access_client" => true,
            "type" => "personnal",
        ];

        DB::table('oauth_clients')->insert($client);
    }
}
