<?php

namespace App\Imports;

use App\Models\City;
use App\Models\Country;
use App\Models\Donor;
use App\Models\FailedImportRecord;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DonorsImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $index => $row) {
            try {
                if (empty(trim($row['account_name'] ?? ''))) {
                    throw new \Exception('Account name is missing');
                }

             
                $country = null;
                // if (!empty(trim($row['country'] ?? ''))) {
                //     $country = Country::firstOrCreate(
                //         ['name' => trim($row['country'])],
                //         ['created_at' => now(), 'updated_at' => now()]
                //     );
                // }
                $city = null;
                // if (!empty(trim($row['city'] ?? '')) && $country) {
                //     $city = City::firstOrCreate(
                //         ['name' => trim($row['city']), 'country_id' => $country->id],
                //         ['created_at' => now(), 'updated_at' => now()]
                //     );
                // }
                $donorData = [
                    'name' => ! empty(trim($row['name'] ?? '')) ? trim($row['name']) : null,
                    'account_name' => ! empty(trim($row['account_name'] ?? '')) ? trim($row['account_name']) : null,
                    'email' => ! empty(trim($row['email'] ?? '')) ? trim($row['email']) : null,
                    'phone' => ! empty(trim($row['phone'] ?? '')) ? trim($row['phone']) : null,
                    'country_id' => $country ? $country->id : null,
                    'city_id' => $city ? $city->id : null,
                    'is_receive_email' => ! empty($row['is_receive_email']) ? (int) $row['is_receive_email'] : 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                $donor = new Donor($donorData);
                $donor->save();
            } catch (\Throwable $e) {
                $accountName = ! empty(trim($row['account_name'] ?? '')) ? trim($row['account_name']) : 'N/A';
                $message = match (true) {
                    str_contains($e->getMessage(), 'Duplicate entry') => "The account name '{$accountName}' already exists.",

                    str_contains($e->getMessage(), 'SQLSTATE[23000]') => "Integrity constraint violation for '{$accountName}'.",

                    default => $e->getMessage()
                };

                // Log failed import record
                FailedImportRecord::create([
                    'account_name' => $accountName,
                    'error'        => $message,
                    // 'row_data'     => json_encode($row->toArray()),
                ]);
            }
        }
    }
}
