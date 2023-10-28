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
use illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

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

        $this->validation($form_data);

        $newdish->fill($form_data);
        
        if($request->hasFile('image')){
            
            $path = Storage::put('dish_photo', $request->image);
            
            $form_data['image'] = $path;
            
            $newdish->image = $form_data['image'];
        }
        
        $newdish->slug = Str::slug($form_data['name'] , '-');

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
        
        $form_data = $request->all();

        $this->validation($form_data);

        if($request->hasFile('image')) {

            if($dish->image){

                Storage::delete($dish->image);
            }

            $path = Storage::put('dish_photo', $request->image);

            $form_data['image'] = $path;

        } 

        
        $dish->slug = Str::slug($form_data['name'] , '-');
        $dish->update($form_data);
        
        return redirect()->route('admin.dishes.show', $dish->slug);
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




    private function validation($form_data){
        $validator = Validator::make($form_data , [
            'name' => 'required|max:50|min:5',
            'description' => 'required|min:5',
            'ingredients' => 'required|regex:/^[a-zA-Z\s,]+$/|min:4',
            'price' => 'required|numeric|max:300',
            'image' => 'nullable|image|max:4096',
            
        ] , [
            
            'name.required' => 'Devi inserire il nome del piatto',
            'name.max' => 'Il nome del piatto può contenere un massimo di :max caratteri',
            'name.min' => 'il nome del piatto deve contenere un minimo di :min caratteri',
            'description.required' => 'Inserisci una descrizione per il tuo piatto!',
            'description.min' => 'la descrizione deve contenere un minimo di :min caratteri',
            'ingredients.required' => 'Inserisci degli ingredienti',
            'ingredients.regex' => 'Inserisci un ingrediente valido!',
            'ingredients.min' => 'il tuo ingrediente deve contenere almeno 4 lettere',
            'price.required' => 'Inserisci un prezzo',
            'price.max' => 'Inserisci un prezzo valido',
            'price.numeric' => 'Inserisci un prezzo valido!',
            'image.max' => 'la dimensione del file è troppo grande!',
            'image.image' => 'Devi inserire un file di tipo immagine!',
            
    
    
        ])->validate();
    
        
    }
}




