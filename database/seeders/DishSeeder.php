<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dish;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dishes = [
            [
                'name' => "spaghetti al pomodoro",
                'description' => "buonissimi",
                'ingredients' => "spaghetti e non lo avresti mai detto ma c'è il pomodoro",
                'visible' => true,
                'price' => 12.50,
                'restaurant_id' => 1,
            ],
            [
                'name' => "soutè di cozze",
                'description' => "buonissimo",
                'ingredients' => "con le cozze",
                'visible' => true,
                'price' => 16.00,
                'restaurant_id' => 2,
            ],
            [
                'name' => "lasagna",
                'description' => "buonissima",
                'ingredients' => "pasta, pomodoro, funghi, besciamella gentilmente preparata con tanto amore",
                'visible' => true,
                'price' => 10.50,
                'restaurant_id' => 3,
            ],
            [
                'name' => "gnocchi al pesto",
                'description' => "buonissimi",
                'ingredients' => "gnocchi, pesto",
                'visible' => true,
                'price' => 14.00,
                'restaurant_id' => 4,
            ],
        ];

        foreach ($dishes as $dish) {
            $newdish = new Dish();
            $newdish->name = $dish['name'];
            $newdish->description = $dish['description'];
            $newdish->ingredients = $dish['ingredients'];
            $newdish->visible = $dish['visible'];
            $newdish->price = $dish['price'];
            $newdish->restaurant_id = $dish['restaurant_id'];
            $newdish->save();
        }
    }
}
