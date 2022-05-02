<?php

namespace Tests;

class ExampleTest extends TestCase
{
    public function test_that_valid_request_returns_200()
    {
        $faker = \Faker\Factory::create();

        $response = $this->call('POST', '/users', [
            'name' => $faker->name(),
            'email' => $faker->email(),
            'password' => $faker->password(6),
        ]);

        $this->assertEquals(
            200,
            $response->status(),
        );
    }

    public function test_that_invalid_request_returns_422()
    {
        $faker = \Faker\Factory::create();

        $response = $this->call('POST', '/users', [
            'name' => $faker->name(),
            'email' => "invalidemail.com",
            'password' => $faker->password(6),
        ]);

        $this->assertEquals(
            422,
            $response->status(),
        );
    }
}
