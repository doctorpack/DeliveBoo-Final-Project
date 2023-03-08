<?php

use App\Dish;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {


        $dishes =  [
            [
                'name' => 'Cheeseburger',
                'price' => 230,
                'image' => 'https://s7d1.scene7.com/is/image/mcdonalds/mcdonalds-Cheeseburger-new:1-3-product-tile-desktop?wid=829&hei=515&dpr=off',
                'visibility' => 1 ,
                'description' => 'Ingredienti: senape,ketchup,formaggio,cipolla,cetrioli,pane',
                'slug' => 'cheeseburger',
                'user_id' => 1,
            ],
            [
                'name' => 'McToast',
                'price' => 230,
                'image' => 'https://www.mcdonalds.it/sites/default/files/products/toast--hero-isolated_0.png',
                'visibility' => 1,
                'description' => 'Ingredienti: formaggio,prosciutto,pane',
                'slug' => 'mctoast',
                'user_id' => 1,
            ],
            [
                'name' => '6 Chicken McNuggets',
                'price' => 610,
                'image' => 'https://s7d1.scene7.com/is/image/mcdonalds/mcdonalds-6-chicken-mcnuggets:1-3-product-tile-desktop?wid=829&hei=515&dpr=off',
                'visibility' => 1,
                'description' => 'Ingredienti: morbide pepite di pollo impanate',
                'slug' => '6mchicken-mcnuggets',
                'user_id' => 1,
            ],
            [
                'name' => 'Chickenburger',
                'price' => 230,
                'image' => 'https://www.mcdonalds.it/sites/default/files/styles/compressed/public/products/chickenburger--hero-isolated_0.png.webp?itok=us6kNx0c',
                'visibility' => 1,
                'description' => 'Ingredienti: salsa caesar, pane , cotoletta di pollo',
                'slug' => 'chickenburger',
                'user_id' =>1,
            ],
            [
                'name' => 'Hamburger',
                'price' => 230,
                'image' => 'https://www.mcdonalds.com/content/dam/usa/nfl/nutrition/items/regular/desktop/t-mcdonalds-Hamburger.jpg',
                'visibility' => 1,
                'description' => 'Ingredienti: senape,ketchup,cipolla,cetrioli,pane',
                'slug' => 'Hamburger',
                'user_id' => 1,
            ],

            [
                'name' => 'Whopper',
                'price' => 699,
                'image' => 'https://cdn.imgbin.com/16/8/25/imgbin-whopper-hamburger-cheeseburger-french-fries-big-king-burger-king-3HYbwhXckfxecPEf0UvVRnpZf.jpg',
                'visibility' => 1,
                'description' => 'A flame-grilled beef patty topped with juicy tomatoes, fresh lettuce, creamy mayonnaise, ketchup, crunchy pickles, and sliced white onions on a soft sesame seed bun.',
                'slug' => 'whopper',
                'user_id' => 2,
            ],
            [
                'name' => 'Chicken Fries',
                'price' => 499,
                'image' => 'https://images.chickadvisor.com/item/52554/375/i/burger-king-chicken-fries.jpg',
                'visibility' => 1,
                'description' => 'Made with white meat chicken, Chicken Fries are coated in a light crispy breading seasoned with savory spices and herbs.',
                'slug' => 'chicken-fries',
                'user_id' => 2,
            ],
            [
                'name' => 'Impossible Whopper',
                'price' => 799,
                'image' => 'https://cdn.sanity.io/images/czqk28jt/prod_bk_us/238e287aa4d92d6e0cc4783e397b6e7386cd2e47-1333x1333.png?w=750&q=40&fit=max&auto=format',
                'visibility' => 1,
                'description' => 'Our Impossible™ WHOPPER® Sandwich features a savory flame-grilled patty made from plants topped with juicy tomatoes, fresh lettuce, creamy mayonnaise, ketchup, crunchy pickles, and sliced white onions on a soft sesame seed bun.',
                'slug' => 'impossible-whopper',
                'user_id' => 2,
            ],
            [
                'name' => 'Original Chicken Sandwich',
                'price' => 649,
                'image' => 'https://cdn.sanity.io/images/czqk28jt/prod_bk_us/fc7c2a73e7a9bf14f3e3401bedcc090c4f421c67-1333x1333.png?w=750&q=40&fit=max&auto=format',
                'visibility' => 1,
                'description' => 'Our Original Chicken Sandwich is made with white meat chicken, lightly breaded and topped with a simple combination of shredded lettuce and creamy mayonnaise on a sesame seed bun.',
                'slug' => 'original-chicken-sandwich',
                'user_id' => 2,
            ],
            [
                'name' => 'French Fries',
                'price' => 299,
                'image' => 'https://burgerkingfrance.twic.pics/img/products/6/d9/6d92ab7c-e386-4499-a71e-65cf00acd8af_?twic=v1/contain=700x700',
                'visibility' => 1,
                'description' => 'Our classic fries are cut thin and cooked until crispy, then lightly salted to perfection.',
                'slug' => 'french-fries',
                'user_id' => 2,
            ],
            [
                'name' => 'Original Recipe Chicken',
                'price' => 799,
                'image' => 'https://media.kfc.it/app/uploads/public/5ec/fc1/e45/thumb_278_800_800_0_0_crop.jpg',
                'visibility' => 1,
                'description' => 'Our Original Recipe® Chicken is hand-breaded and seasoned with a bold blend of 11 herbs and spices. Then it’s slow cooked to perfection so it’s juicy and perfectly crispy.',
                'slug' => 'original-recipe-chicken',
                'user_id' => 3,
            ],
            [
                'name' => 'Zinger Sandwich',
                'price' => 699,
                'image' => 'https://media.kfc.it/app/uploads/public/5ec/fe9/356/thumb_292_800_800_0_0_crop.jpg',
                'visibility' => 1,
                'description' => 'Our new Spicy Zinger Sandwich is a 100% chicken breast filet, breaded and fried to perfection, then topped with spicy mayo and crisp lettuce on a toasted sesame seed bun.',
                'slug' => 'zinger-sandwich',
                'user_id' => 3,
            ],
            [
                'name' => 'Popcorn Chicken',
                'price' => 599,
                'image' => 'https://media.kfc.it/app/uploads/public/5f1/6f1/050/thumb_358_800_800_0_0_crop.jpg',
                'visibility' => 1,
                'description' => 'Our Popcorn Chicken is made with juicy, tender and crispy 100% chicken breast, seasoned with our signature blend of spices and herbs, and served with your choice of dipping sauce.',
                'slug' => 'popcorn-chicken',
                'user_id' => 3,
            ],
            [
                'name' => 'Famous Bowl',
                'price' => 649,
                'image' => 'https://media.kfc.it/app/uploads/public/5ee/241/83b/thumb_339_800_800_0_0_crop.jpg',
                'visibility' => 1,
                'description' => 'Our Famous Bowl® is layers of our famous Mashed Potatoes, sweet corn, crispy chicken, and creamy gravy all topped with shredded cheese.',
                'slug' => 'famous-bowl',
                'user_id' => 3,
            ],
            [
                'name' => 'Mashed Potatoes & Gravy',
                'price' => 780,
                'image' => 'https://media.kfc.it/app/uploads/public/5f0/742/21d/thumb_356_800_800_0_0_crop.jpg',
                'visibility' => 1,
                'description' => 'Our creamy mashed potatoes are served with our signature gravy.',
                'slug' => 'mashed-potatoes-gravy',
                'user_id' => 3,
            ],
            [
                'name' => 'la leggenda',
                'price' => 699,
                'image' => 'https://www.lapiadineria.com/assets/img/console/mo/products/1125_image_it.png?v=1675874670',
                'visibility' => 1,
                'description' => 'piadina leggendaria, con gustoso crudo,stracchino,rucola.',
                'slug' => 'la-leggenda',
                'user_id' => 4,
            ],
            [
                'name' => 'la leggenda special edition',
                'price' => 945,
                'image' => 'https://www.lapiadineria.com/assets/img/console/mo/products/1126_image_it.png?v=1675874719',
                'visibility' => 1,
                'description' => 'piadina leggendaria, con gustoso crudo,stracchino,rucola,salse varie, petali di fiori',
                'slug' => 'la-leggenda-special-edition',
                'user_id' => 4,
            ],
            [
                'name' => 'il papripollo',
                'price' => 550,
                'image' => 'https://www.lapiadineria.com/assets/img/console/mo/products/1098_image_it.png?v=1668443736',
                'visibility' => 1,
                'description' => 'mozzarella,rucika,pollo alla paprika',
                'slug' => 'il-papripollo',
                'user_id' => 4,
            ],
            [
                'name' => 'il patapollo ',
                'price' => 560,
                'image' => 'https://www.lapiadineria.com/assets/img/console/mo/products/824_image_it.png?v=1654072575',
                'visibility' => 1,
                'description' => 'pollo,patate,salsa bbq,',
                'slug' => 'il-patapollo',
                'user_id' => 4,
            ],
            [
                'name' => 'il granapollo',
                'price' => 480,
                'image' => 'https://www.lapiadineria.com/assets/img/console/mo/products/1117_image_it.png?v=1669367279',
                'visibility' => 1,
                'description' => 'lattuga,pomodoro,grana,fileto di pollo,salsa yogurt',
                'slug' => 'grana-pollo',
                'user_id' => 4,
            ],
            [
                'name' => 'samba roll',
                'price' => 1099,
                'image' => 'http://cdn.shopify.com/s/files/1/0561/7251/1441/products/DSC07687-Modifica_1200x1200.jpg?v=1621431500',
                'visibility' => 1,
                'description' => 'componi il tuo big plate,goditi i tuoi roll',
                'slug' => 'samba-roll',
                'user_id' => 5,
            ],
            [
                'name' => 'samba roll',
                'price' => 1099,
                'image' => 'https://www.sushitecazen.it/wp-content/uploads/2022/09/76-MISTO-COTTO-10pz.jpg',
                'visibility' => 1,
                'description' => 'componi il tuo big plate,goditi i tuoi roll',
                'slug' => 'samba-roll',
                'user_id' => 5,
            ],
            [
                'name' => 'copacabana',
                'price' => 1190,
                'image' => 'https://www.irorisushiathome.it/wp-content/uploads/2022/04/Temaki-Unaji-scaled.jpg',
                'visibility' => 1,
                'description' => 'camarao empanado più salmone e philadelphia',
                'slug' => 'copacabana',
                'user_id' => 5,
            ],
            [
                'name' => 'ipanamea',
                'price' => 380,
                'image' => 'https://hips.hearstapps.com/gioit.h-cdn.co/assets/17/03/1484838345-sushirolls-tutorial.jpg',
                'visibility' => 1,
                'description' => 'camarao empanado più salmone e philadelphia',
                'slug' => 'ipanamea',
                'user_id' => 5,
            ],
            [
                'name' => 'santos roll mix',
                'price' => 380,
                'image' => 'https://www.tokyofusionsushi.it/wp-content/uploads/2020/06/sashi-jinyuan-top.jpg',
                'visibility' => 1,
                'description' => 'salmone roll,nighiri roll,philadelphia,e altra roba simil giapponese',
                'slug' => 'santos-rool-mix',
                'user_id' => 5,
            ],

        ];
        foreach ($dishes as $Dish) {

            $objdish = new Dish;
            $objdish->name          = $Dish['name'];
            $objdish->price         = $Dish['price'];
            $objdish->image         = $Dish['image'];
            $objdish->visibility     = $Dish['visibility'];
            $objdish->description   = $Dish['description'];
            $objdish->slug          = $Dish['slug'];
            $objdish->user_id       = $Dish['user_id'];
            $objdish->save();
        }
    }
}
