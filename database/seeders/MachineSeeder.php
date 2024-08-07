<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Machine;
use App\Models\MachineUse;
use App\Models\MachineStatus;

class MachineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $uses = MachineUse::pluck('id')->toArray();
        $statuses = MachineStatus::pluck('id')->toArray();

        $machines = [
            'Potong 1',
            'Potong 2',
            'Potong 3',
            'Jahit 1',
            'Jahit 2',
            'Jahit 3',
            'Jahit 4',
            'Jahit 5',
            'Setrika 1',
            'Setrika 2',
            'Setrika 3',
        ];

        foreach ($machines as $name) {
            Machine::create([
                'name' => $name,
                'use_id' => $uses[array_rand($uses)],
                'status_id' => $statuses[array_rand($statuses)],
            ]);
        }
    }
}
