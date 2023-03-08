<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TypeSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(DishSeeder::class);
        $this->call(OrderSeeder::class);
    }
}
