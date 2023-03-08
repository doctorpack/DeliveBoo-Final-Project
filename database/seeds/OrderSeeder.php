<?php
use App\Dish;
use App\User;
use App\Order;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(Faker $faker)
    {

        $max_user_id = User::max('id');
        for ($i = 0; $i < 50; $i++) {
            $user_id = rand(1, 5 );
            $dish_ids = Dish::where('user_id', $user_id)->pluck('id')->toArray();
            $order = Order::create([
                'address' => $faker->address(),
                'customer_name' => $faker->words(2, true),
                'email' => $faker->email(),
            ]);
            $min_dishes = 1;
            $max_dishes = 5;
            $selected_dishes = $faker->randomElements($dish_ids, $faker->numberBetween($min_dishes, $max_dishes));
            $order->dishes()->attach($selected_dishes);
        }
    }
}
