<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'name',
        'address',
        'piva',
        'photo',
        'slug'
    ];


    public function types(){
        return $this->belongsToMany(Type::class);
    }


    public function dishes(){

        return $this->hasMany(Dish::class);
    }

    

    
}
