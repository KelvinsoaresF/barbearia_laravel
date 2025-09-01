<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services')->insert([
            [
                'name' => 'Corte de Cabelo',
                'description' => 'Corte de cabelo masculino, na tesoura ou máquina.',
                'price' => 35.00,
                'duration' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Barba',
                'description' => 'Aparar e modelar a barba com navalha e acabamento.',
                'price' => 25.00,
                'duration' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Corte + Barba',
                'description' => 'Pacote especial: corte de cabelo + barba completa.',
                'price' => 50.00,
                'duration' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sobrancelha',
                'description' => 'Design de sobrancelha masculino.',
                'price' => 15.00,
                'duration' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
