<?php

namespace Database\Seeder;

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\WithFaker;

class UserSeeder extends Seeder
{
    use WithFaker;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\User::class)->create(
            [
                'email' => env("SEEDED_USER", $this->faker->email),
                'password' => bcrypt(env("SEEDED_PASSWORD")),
            ]
        );
    }
}
