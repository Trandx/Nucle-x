<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $user = [
            'first_name' => 'test_2',
            'last_name' => 'test_2',

            'phones->active' => $this->faker->numerify("+237-#########"),
            'phones->all' => [$this->faker->numerify("+237-#########"), $this->faker->numerify("+237-#########")],

            'email->active' => $this->faker->unique()->safeEmail(),
            'email->old' => [
                $this->faker->unique()->safeEmail(),
                $this->faker->unique()->safeEmail()
            ],

            'username' => $this->faker->userName(),

            'avatar->thumb' => '',
            'avatar->real_size' => 'test_2',
            'avatar->old' => ['test_2'],
            'birthday' => $this->faker->date(),
            'email_verified' => true,
            'phone_verified' => true,
            'account_actived' => true,
            'password' => bcrypt('test'),

        ];

        return $user;
    }

    // /**
    //  * Indicate that the model's email address should be unverified.
    //  *
    //  * @return \Illuminate\Database\Eloquent\Factories\Factory
    //  */
    // public function unverified()
    // {
    //     return $this->state(function (array $attributes) {
    //         return [
    //             'email_verified_at' => null,
    //         ];
    //     });
    // }
}
