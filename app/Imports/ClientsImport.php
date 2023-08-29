<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Client;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ClientsImport implements ToModel, SkipsEmptyRows, WithStartRow
{
    public function model(array $row)
    {
        return Client::firstOrCreate([
            'company_name' => $row[1],
            'representative_id' => User::firstOrCreate([
                'email' => 'accounting@mail.com',
            ], [
                'name' => 'Accounting Department',
                'password' => bcrypt(str()->random(10)),
                'mobile_number' => random_int(1000000000, 9999999999),
            ])->id,
            'street' => Str::replaceLast(',', '', trim($row[3])),
            'city' => Str::replaceLast(',', '', trim($row[4])),
            'province' => Str::replaceLast(',', '', trim($row[5])),
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
