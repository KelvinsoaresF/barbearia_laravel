<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AvailabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $date = Carbon::today();

        // Gerar 5 dias úteis a partir de hoje
        for ($i = 0; $i < 5; $i++) {
            if ($date->isWeekend()) {
                $date->addDay();
                continue;
            }

            // Criar alguns horários por dia
            $timeslots = ['09:00:00', '10:00:00', '11:00:00', '14:00:00', '15:00:00', '16:00:00'];

            foreach ($timeslots as $slot) {
                DB::table('availabilities')->insert([
                    'date'       => $date->format('Y-m-d'),
                    'timeslot'   => $slot,
                    'is_booked'  => false,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            $date->addDay();
        }
    }
}
