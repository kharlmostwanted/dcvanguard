<?php

namespace Database\Seeders;

use App\Imports\EmployeesImport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Excel::import(new EmployeesImport, database_path('spreadsheets/SECURITY-GUARD-MASTERLIST-2024.xlsx'));
    }
}
