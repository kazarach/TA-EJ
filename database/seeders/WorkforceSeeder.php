<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Workforce;
use App\Models\WorkforceStatus;
use App\Models\WorkforcePosition;

class WorkforceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $positions = WorkforcePosition::pluck('id')->toArray();
        $statuses = WorkforceStatus::pluck('id')->toArray();

        $workforces = [
            'Juan Meta',
            'Edwin Makarim',
            'Sarah Johnson',
            'Michael Brown',
            'Jessica Williams',
            'Daniel Jones',
            'Emily Davis',
            'David Wilson',
            'Sophia Moore',
            'James Taylor',
            'Isabella Anderson',
            'Christopher Thomas',
            'Mia Jackson',
            'Matthew White',
            'Emma Harris',
            'Joshua Martin',
            'Olivia Thompson',
            'Andrew Garcia',
            'Ava Martinez',
            'Jacob Robinson'
        ];

        foreach ($workforces as $name) {
            Workforce::create([
                'name' => $name,
                'position_id' => $positions[array_rand($positions)],
                'status_id' => $statuses[array_rand($statuses)],
            ]);
        }
    }
}
