<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        \App\Room::create(
            [
                'name' => $faker->name,
            ]
        );

        $room = \App\Room::first();

        $users = \App\User::all();
        foreach ($users as $user) {
            $user->rooms()->save($room);
        }
    }
}
