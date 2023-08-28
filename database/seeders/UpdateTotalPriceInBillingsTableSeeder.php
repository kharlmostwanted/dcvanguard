<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Billing;

class UpdateTotalPriceInBillingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Billing::lazy()->each(function ($billing) {
            $billing->update(['total_price' => $billing->total_amount]);
        });
    }
}
