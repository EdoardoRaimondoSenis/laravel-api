<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = ['Post belli', 'Post brutti', 'Post mediocri'];

        foreach($data as $type) {
            $newType = new Type();
            $newType->name = $type;
            $newType->save();
        }
    }
}
