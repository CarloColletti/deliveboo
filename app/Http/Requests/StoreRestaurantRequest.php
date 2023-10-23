<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRestaurantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:100'],
            'piva' => ['required', 'unique:restaurants,piva', 'size:11'],
            'address' => ['required', 'max:255'],
        ];
    }

    public function messages()
    {
        return[
            //Name
            'name.required' => "Il campo 'Nome' è obbligatorio",
            'name.unique' => "Il campo 'Nome' inserito è già stato utilizzato.",
            'name.max' => "Il campo 'Nome' deve contenere al massimo :max caratteri",
            //P_Iva
            'piva.required' => "Il campo 'Partita Iva' è obbligatorio",
            'piva.unique' => "Il campo 'Partita Iva' inserito è già stato utilizzato.",
            'piva.size' => "Il campo 'Partita Iva' deve contenere esattamente :size caratteri",
            //Address
            'address.required' => "Il campo 'Indirizzo' è obbligatorio",
            'address.max' => "Il campo 'address' deve contenere al massimo :max caratteri",
        ];
    }
}

