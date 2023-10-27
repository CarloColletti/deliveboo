<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Dish;
use App\Http\Requests\StoreDishRequest;
use App\Http\Requests\UpdateDishRequest;
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Middleware\Authenticate;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $restaurant = Restaurant::where('user_id' , $user->id)->first(); 
        
        $dishes = Dish::where('restaurant_id', $restaurant->id)->get();
        
     
        
        return view('admin.dishes.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
      
        return view('admin.dishes.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDishRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDishRequest $request)
    {
        $user = Auth::user();
        
        $restaurant = Restaurant::where('user_id' , $user->id)->first();
       
        
        $newdish = new Dish();
        $newdish->restaurant_id = $restaurant->id;
        
        $form_data = $request->all();
        $newdish->fill($form_data);

        if($request->hasFile('image')){

            $path = Storage::put('dish_photo', $request->image);

            $form_data['image'] = $path;

            $newdish->image = $form_data['image'];
        }


        $newdish->save();

       
        
        return redirect()->route('admin.restaurants.show', compact('restaurant') );  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        return view('admin.dishes.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        
        return view('admin.dishes.edit', compact('dish'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDishRequest  $request
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDishRequest $request, Dish $dish)
    {
        $user = Auth::user();
        $form_data = $request->all();

        if($request->hasFile('image')) {

            if($dish->image){

                Storage::delete($dish->image);
            }

            $path = Storage::put('dish_photo', $request->image);

            $form_data['image'] = $path;

        } 

        
        $dish->update($form_data);
        
        return redirect()->route('admin.dishes.show', compact('dish'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        if($dish->image){

            Storage::delete($dish->image);
        }

       
        $dish->delete();

        return redirect()->route('admin.dishes.index');
    }
}
