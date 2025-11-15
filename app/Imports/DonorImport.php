<?php 
namespace App\Imports;
use App\Models\Donor;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DonorImport implements OnEachRow, WithHeadingRow
{
    public function onRow(Row $row)
    {
        $data = $row->toArray();

        $firstName = trim($data['name'] ?? '');
        $lastName = trim($data['last_name'] ?? '');
        $fullName = "{$firstName} {$lastName}";

        $baseAccountName = Str::slug($fullName); // e.g. "john-doe"

        // Ensure uniqueness by appending a number if needed
        $accountName = $baseAccountName;
        $i = 1;
        while (Donor::where('account_name', $accountName)->exists()) {
            $accountName = $baseAccountName . '-' . str_pad($i++, 3, '0', STR_PAD_LEFT);
        }

        Donor::create([
            'name' => $fullName,
            'account_name' => $accountName,
            'email' => $data['email'] ?? null,
            'phone' => $data['phone'] ?? null,
            'whatsapp_no' => $data['whatsapp_no'] ?? null,
            'country_id' => $data['country_id'] ?? null,
            'city_id' => $data['city_id'] ?? null,
            'address' => $data['address'] ?? null,
            'status' => $data['status'] ?? 'active',
            'donor_type' => $data['donor_type'] ?? 'individual',
            'is_receive_email' => $data['is_receive_email'] ?? true,
            'created_by' => auth()->id() ?? 1,
        ]);
    }
}
