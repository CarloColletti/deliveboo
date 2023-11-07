<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index(){

        $restaurants = Restaurant::with(['dishes' , 'types'])->get();

        return response()->json([
            'success' => true,
            'results' => $restaurants
        ]);

    }


    public function show($slug){
        
        $restaurant = restaurant::where('slug', $slug)->with('dishes')->first();

        

        if($restaurant == null) {

            return response()->json([

                'success' => false,
                'error' => 'Questo progetto non esiste!'
            ]);
        
        } else {

            return response()->json([
                'success' => true,
                'results' => $restaurant,
                  
            ]);

        }

    }
}
