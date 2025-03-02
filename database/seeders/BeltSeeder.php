<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Belt;

class BeltSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            1 => [
                "name" => "Branca",
                "color" => "#FFFFFF"
            ],
            2 => [
                "name" => "Amarela",
                "color" => "#E7E906"
            ],
            3 => [
                "name" => "Laranja",
                "color" => "#e69138"
            ],
            4 => [
                "name" => "Azul",
                "color" => "#16537e"
            ],
            5 => [
                "name" => "Verde",
                "color" => "#38761d"
            ],
            6 => [
                "name" => "Roxa",
                "color" => "#6a329f"
            ],
            7 => [
                "name" => "Marrom",
                "color" => "#744700"
            ],
            8 => [
                "name" => "Preta 1º Dan",
                "color" => "#000000"
            ],
            9 => [
                "name" => "Preta 2º Dan",
                "color" => "#000000"
            ],
            10 => [
                "name" => "Preta 3º Dan",
                "color" => "#000000"
            ],
            11 => [
                "name" => "Preta 4º Dan",
                "color" => "#000000"
            ],
            12 => [
                "name" => "Preta 5º Dan",
                "color" => "#000000"
            ],
            13 => [
                "name" => "Preta 6º Dan",
                "color" => "#000000"
            ],
            14 => [
                "name" => "Preta 7º Dan",
                "color" => "#000000"
            ],
            15 => [
                "name" => "Preta 8º Dan",
                "color" => "#000000"
            ],
            16 => [
                "name" => "Preta 9º Dan",
                "color" => "#000000"
            ],
            17 => [
                "name" => "Preta 10º Dan",
                "color" => "#000000"
            ],
        ];

        foreach ($data as $belt) {
            Belt::updateOrCreate($belt);
        }
    }
}
