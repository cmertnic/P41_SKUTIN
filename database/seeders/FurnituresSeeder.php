<?php

namespace Database\Seeders;

use App\Models\Furniture;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FurnituresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Furniture::insert(
            [
                [
                    'title'=> 'табурет',
                    'price'=> '500р',
                ],
                [
                    'title'=> 'стул',
                    'price'=> '1500р',
                ],
                [
                    'title'=> 'кресло',
                    'price'=> '3000р',
                ],
                [
                    'title'=> 'диван',
                    'price'=> '10000р',
                ],
            ]
        );
    }
}
