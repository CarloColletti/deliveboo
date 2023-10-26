<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types= [ 'Italiano' , 'Messicano' , 'Giapponese' , 'Indiano' , 'Americano' , 'Napoletano' , ' Cinese' ] ; 
        
            
        

        foreach ($types as $type) {
            $newtype = new Type();
            $newtype->name = $type;
            $newtype->save();
        }
    }
}
