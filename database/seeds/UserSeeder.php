<?php

use App\Type;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $types = Type::all()->pluck('id');
        $restaurants = [
            [
                'name'       =>  'McDonald',
                'email'      =>  'mcdonald@libero.it',
                'password'   =>   Hash::make('mcdonald'),
                'address'    =>   $faker->address(),
                'PIVA'       =>   $faker->randomNumber(9, true),
                'slug'       =>   User::getSlug('McDonald'),
                'image_logo' =>   'https://th.bing.com/th/id/R.da336bbaab21212bc10d15dab7e6a0d1?rik=G1J0a4Fq%2fybydA&pid=ImgRaw&r=0',
            ],
            [
                'name'       =>  'BurgerKing',
                'email'      =>  'burgerking@libero.it',
                'password'   =>   Hash::make('BurgerKing'),
                'address'    =>   $faker->address(),
                'PIVA'       =>   $faker->randomNumber(9, true),
                'slug'       =>   User::getSlug('BurgerKing'),
                'image_logo' =>   'https://th.bing.com/th/id/R.180424d9891acbfe9e6446bfbd5d4368?rik=S%2bGdVKF0hj0o3Q&riu=http%3a%2f%2flogos-download.com%2fwp-content%2fuploads%2f2016%2f04%2fBurger_King_logo_emblem-2.png&ehk=j3T6tYeOtJNsvETcch%2fpSOBmsGu%2fkoYGPgbf6CgnpEY%3d&risl=&pid=ImgRaw&r=0',
            ],
            [
                'name'       =>  'Kfc',
                'email'      =>  'kfc@libero.it',
                'password'   =>   Hash::make('Kfc'),
                'address'    =>   $faker->address(),
                'PIVA'       =>   $faker->randomNumber(9, true),
                'slug'       =>   User::getSlug('Kfc'),
                'image_logo' =>   'https://th.bing.com/th/id/R.a84527ac99a83c019e586336c0372319?rik=%2bgYPK9rmS5wFPA&riu=http%3a%2f%2f1000logos.net%2fwp-content%2fuploads%2f2017%2f03%2fKFC-Logo.png&ehk=hC2TvC7Toy8sZY%2bfBR00pnVfnmPGaHpb0Nvz%2fy8l970%3d&risl=&pid=ImgRaw&r=0',
            ],
            [
                'name'       =>  'La Piadineria',
                'email'      =>  'lapiadineria@libero.it',
                'password'   =>   Hash::make('lapiadineria'),
                'address'    =>   $faker->address(),
                'PIVA'       =>   $faker->randomNumber(9, true),
                'slug'       =>   User::getSlug('lapiadineria'),
                'image_logo' =>   'https://th.bing.com/th/id/R.60a1f45e011f0e2e0582a7ad96dbc9a9?rik=kA64XqJn52vAwQ&pid=ImgRaw&r=0',
            ],
            [
                'name'       =>  'Temakinho',
                'email'      =>  'temakinho@libero.it',
                'password'   =>   Hash::make('temakinho'),
                'address'    =>   $faker->address(),
                'PIVA'       =>   $faker->randomNumber(9, true),
                'slug'       =>   User::getSlug('temakinho'),
                'image_logo' =>   'https://cdn.shopify.com/s/files/1/0016/0831/9029/files/temakinho-logo-black_200x.png?v=1542021222',
            ],
            [
                'name'       =>  'Hamerica\'s',
                'email'      =>  'Hamericas@libero.it',
                'password'   =>   Hash::make('Hamericas'),
                'address'    =>   $faker->address(),
                'PIVA'       =>   $faker->randomNumber(9, true),
                'slug'       =>   User::getSlug('Hamericas'),
                'image_logo' =>   'https://th.bing.com/th/id/OIP.irAtRMdjnrpSr1cZNdjq6AHaDt?pid=ImgDet&rs=1',
            ],
            [
                'name'       =>  'Rossopomodoro',
                'email'      =>  'rossopomodoro@libero.it',
                'password'   =>   Hash::make('rossopomodoro'),
                'address'    =>   $faker->address(),
                'PIVA'       =>   $faker->randomNumber(9, true),
                'slug'       =>   User::getSlug('rossopomodoro'),
                'image_logo' =>   'https://th.bing.com/th/id/R.6fa579650d9c21682699d08333fccca5?rik=zZHRHiO%2fxDaz%2bA&riu=http%3a%2f%2flogos-download.com%2fwp-content%2fuploads%2f2016%2f04%2fRossopomodoro_logo_logotype_emblem.jpg&ehk=stQ%2bVNsAnWizuGwtyp%2baGJWye1H0caWHPahmQSnhfXU%3d&risl=&pid=ImgRaw&r=0',
            ],
            [
                'name'       =>  'Alice Pizza',
                'email'      =>  'alicepizza@libero.it',
                'password'   =>   Hash::make('alicepizza'),
                'address'    =>   $faker->address(),
                'PIVA'       =>   $faker->randomNumber(9, true),
                'slug'       =>   User::getSlug('alicepizza'),
                'image_logo' =>   'https://th.bing.com/th/id/R.979dd48bd3ecfb20cbd1275ae63eddb6?rik=Bt92EjrpuMvBbg&riu=http%3a%2f%2fwww.ansa.it%2fwebimages%2fch_620x438%2f2019%2f3%2f27%2f4840b0da787a856eb5674ce6c7868b8a.jpg&ehk=byz5tFXmf%2fjO9ZlKV1z2dTWmO4zLZ73850LqpbZtEpM%3d&risl=&pid=ImgRaw&r=0',
            ],
            [
                'name'       =>  'Five Guys',
                'email'      =>  'fiveguys@libero.it',
                'password'   =>   Hash::make('fiveguys'),
                'address'    =>   $faker->address(),
                'PIVA'       =>   $faker->randomNumber(9, true),
                'slug'       =>   User::getSlug('fiveguys'),
                'image_logo' =>   'https://th.bing.com/th/id/R.55bc8a6b73247dbc3627ce0a9214a5d7?rik=uBnbP8ASkza5UQ&pid=ImgRaw&r=0',
            ],
            [
                'name'       =>  'Poke House',
                'email'      =>  'pokehouse@libero.it',
                'password'   =>   Hash::make('pokehouse'),
                'address'    =>   $faker->address(),
                'PIVA'       =>   $faker->randomNumber(9, true),
                'slug'       =>   User::getSlug('pokehouse'),
                'image_logo' =>   'https://www.speedetab.com/assets/appicon2-c8c764e84ba33877aefb43db69f716f8df32800cad74c8adb01188b13672ac54.png',
            ],
            [
                'name'       =>  'Burgez',
                'email'      =>  'burgez@libero.it',
                'password'   =>   Hash::make('burgez'),
                'address'    =>   $faker->address(),
                'PIVA'       =>   $faker->randomNumber(9, true),
                'slug'       =>   User::getSlug('burgez'),
                'image_logo' =>   'https://th.bing.com/th/id/R.8a39b482d9bbbd803a5523039d5a8fb4?rik=%2fp6bAYR0ePezUg&pid=ImgRaw&r=0',
            ],
            [
                'name'       =>  'Old Wild West',
                'email'      =>  'oldwildwest@libero.it',
                'password'   =>   Hash::make('oldwildwest'),
                'address'    =>   $faker->address(),
                'PIVA'       =>   $faker->randomNumber(9, true),
                'slug'       =>   User::getSlug('oldwildwest'),
                'image_logo' =>   'https://th.bing.com/th/id/R.19e85c9410d990626e58d5eff0be635a?rik=5TsgscwjUFyFkg&pid=ImgRaw&r=0',
            ],
            [
                'name'       =>  'Roadhouse',
                'email'      =>  'roadhouse@libero.it',
                'password'   =>   Hash::make('roadhouse'),
                'address'    =>   $faker->address(),
                'PIVA'       =>   $faker->randomNumber(9, true),
                'slug'       =>   User::getSlug('roadhouse'),
                'image_logo' =>   'https://th.bing.com/th/id/R.e0facb5661481064564d1a77c46462f3?rik=TtKLXAmf8LGVng&pid=ImgRaw&r=0&sres=1&sresct=1',
            ],
        ];


        foreach ($restaurants as $restaurant) {

            $objUser = new User;
            $objUser->name        = $restaurant['name'];
            $objUser->email       = $restaurant['email'];
            $objUser->password    = $restaurant['password'];
            $objUser->address     = $restaurant['address'];
            $objUser->PIVA        = $restaurant['PIVA'];
            $objUser->slug        = $restaurant['slug'];
            $objUser->image_logo  = $restaurant['image_logo'];
            $objUser->save();
            $objUser->types()->attach($faker->randomElements($types, 2));
        }
    }
}
