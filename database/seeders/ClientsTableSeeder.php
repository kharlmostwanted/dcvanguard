<?php

namespace Database\Seeders;

use App\Imports\ClientsImport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Excel::import(new ClientsImport, database_path('spreadsheets/clients.xlsx'));
    }
}
