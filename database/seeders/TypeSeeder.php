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
        $types=[
            [
                'name' => "Italiano"
            ],
            [
                'name' => "Messicano"
            ],
            [
                'name' => "Giapponese"
            ],
            [
                'name' => "Indiano"
            ],
            [
                'name' => "Americano"
            ],
            [
                'name' => "Napoletano"
            ],
            [
                'name' => "Cinese"
            ],
        ];

        foreach ($types as $type) {
            $newtype = new Type();
            $newtype->name = $type['name'];
            $newtype->save();
        }
    }
}
