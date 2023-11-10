<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Dish;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $formData = $request->all();
        // $newOrder = new Order;
        // $newOrder->fill($formData);
        // $newOrder->save();  
        // if(empty($formData)) {
    
        //     return response()->json([
    
        //         'success' => false,
        //         'error' => 'Questo progetto non esiste!'
        //     ]);
        
        // } else {
    
        //     return response()->json([
        //         'success' => true,
        //         'results' => $formData,
                  
        //     ]);
    
        // }

        try {
            $formData = $request->all();
            
            $newOrder = new Order;
            $newOrder->fill($formData);
            $newOrder->save();

            foreach ($formData['finalCart'] as $dishData) {
                $dish = Dish::find($dishData['id']);
            
                // Verifica che $dish esista e che quantity sia presente e non nullo
                if ($dish && array_key_exists('quantity', $dishData) && !is_null($dishData['quantity'])) {
                    $newOrder->dishes()->attach($dish, [
                        'quantity' => $dishData['quantity'],
                        'created_at' => now(), // Imposta la data corrente
                    ]);
                } else {
                    // Gestisci il caso in cui il piatto non può essere inserito correttamente
                    // Puoi anche aggiungere un log per vedere i dettagli dell'errore
                    Log::error("Impossibile aggiungere il piatto {$dishData['id']} all'ordine. Dati mancanti o errati.");
                }
            }
    
            return response()->json([
                'success' => true,
                'results' => $formData,
                
            ]);

           
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'success' => false,
                'error' => 'Errore interno del server',
                'details' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
