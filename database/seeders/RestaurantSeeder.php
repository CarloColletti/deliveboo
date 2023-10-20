<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Restaurant;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $restaurants = [
            [
                'user_id' => 1,
                'name' => "Da Franco",
                'address' => "Via Como",
                'piva' => "12345678912",
                'photo' => "https://media-cdn.tripadvisor.com/media/photo-s/1d/7c/fc/12/tavolata-vista-lago.jpg", 
            ], 
            
            [
                'user_id' => 2,
                'name' => "Da Pasquale",
                'address' => "Via Alberobello",
                'piva' => "12987654321",
                'photo' => "https://www.italyeatfood.it/wp-content/plugins/directory-extension-plugin//aitDirGallery/timthumb/timthumb.php?h=500&w=500&&q=100&a=c&zc=3&src=https://www.italyeatfood.it/wp-content/uploads/2015/06/ristorante_italia_isola_pescatori_stresa_esterno.jpg", 
            ],

            [
                'user_id' => 3,
                'name' => "L'antico vicolo",
                'address' => "Piazza dei re",
                'piva' => "12346734872",
                'photo' => "https://media-cdn.tripadvisor.com/media/photo-s/0e/41/d6/4e/la-veranda.jpg", 
            ],

            [
                'user_id' => 4,
                'name' => "Ristorante Italia",
                'address' => "Corso Cavour",
                'piva' => "85384634872",
                'photo' => "https://www.itinerariesapori.it/files/ristorante-italia-maccagno/ristorante-italia-maccagno.jpg", 
            ]     
        ];

        foreach ($restaurants as $restaurant) {
            $newRestaurant = new Restaurant();
            $newRestaurant->user_id = $restaurant['user_id'];
            $newRestaurant->name = $restaurant['name'];
            $newRestaurant->address = $restaurant['address'];
            $newRestaurant->piva = $restaurant['piva'];
            $newRestaurant->photo = $restaurant['photo'];
            $newRestaurant->save();
        }
    }
}
