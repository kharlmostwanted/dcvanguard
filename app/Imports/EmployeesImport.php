<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Carbon;

class EmployeesImport implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            try {
                Employee::updateOrCreate([
                    'name' => $row['last_name'] . ' ' . $row['first_name'] . ' ' . $row['middle_name'],
                ], [
                    'last_name' => $row['last_name'],
                    'first_name' => $row['first_name'],
                    'middle_name' => $row['middle_name'],
                    'birth_date' => !empty($row['birthday']) ? Carbon::parse($row['birthday']) : null,
                    'address' => $row['address'],
                    'contact_number' => $row['contact_no'],
                    'sss_number' => $row['sss_number_no'],
                    'philhealth_number' => $row['philhealth'],
                    'pagibig_number' => $row['pag_ibig_no'],
                    'tin_number' => $row['tin_number'],
                    'license_number' => $row['license'],
                    'expired_at' => $this->getDateValue($row['expiry_date']),
                    'employed_at' => $this->getDateValue($row['date_of_employment']),
                    'status' => $row['a'],
                    'id_number' => $row['id_number'],
                ]);
            } catch (\Exception $e) {
                if (!empty($row['first_name']) && $row['last_name'] != 'LAST NAME') {
                    dump($row);
                    dump($e->getMessage());
                }
            }
        }
    }

    public function parseDate($value)
    {
        return Carbon::parse($value);
    }

    public function headingRow(): int
    {
        return 2;
    }

    public function getDateValue($value)
    {
        if (empty($value)) {
            return null;
        }
        try {
            if (is_numeric($value)) {
                $date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value);
                return Carbon::instance($date);
            } else {
                return Carbon::parse($value);
            }
        } catch (\Exception $e) {
            // Handle the exception if the date format is incorrect
            dump("Error parsing date: " . $value);
            return null;
        }
    }
}
