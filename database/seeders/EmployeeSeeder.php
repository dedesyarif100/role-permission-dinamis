<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = [
            'Dede Syarifudin',
            'Riand Pratama',
            'Hendro Rachmad',
            'Trisuli Prasetyo'
        ];

        foreach ($name as $key => $employee) {
            Employee::insert([
                [
                    'createdate' => now(),
                    'nik' => 1234,
                    'name' => $employee,
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            ]);
        }
    }
}
