<?php

use App\Type;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $restaurants = User::all()->pluck('id');
        $types = [
            'Americani',
            'Thai',
            'Halal',
            'Sushi',
            'Italiano',
            'Libanese',
            'Indiano',
            'Messicano',
            'Greco',
            'Dolci',
            'Vegetariani',
            'Giapponese',
            'Cinese',
            'Colazione',
            'Pizza',
        ];

        foreach ($types as $type) {
            $objType = new Type;
            $objType->name = $type;
            $objType->save();
        }
    }
}
