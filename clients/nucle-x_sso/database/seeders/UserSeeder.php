<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $first = [
            'first_name' => 'Argand',
            'last_name' => 'Sandjon',

            'phones->active' => "+237-696125548",
            'phones->all' => ["+237-696125548", "+237-680204264"],

            'email->active' => "tsabimmo@gmail.com",
            'email->old' => [
            ],

            'username' => "Trandx",

            'avatar->thumb' => '',
            'avatar->real_size' => 'test_2',
            'avatar->old' => ['test_2'],
            'birthday' => "05-01-1999",
            'email_verified' => true,
            'phone_verified' => true,
            'account_actived' => true,
            'password' => bcrypt('test'),

        ];

        User::create($first);

        User::factory()->count(10)->create();

    }
}
