<?php

namespace App\Imports;

use App\Models\FailedImportRecord;
use App\Models\Donation;
use App\Models\Donor;
use App\Models\Campaign;
use App\Models\PaymentMethod;
use App\Models\DonationSource;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Exception;

class DonationsImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $index => $row) {
            try {
                // Validate required fields
                if (empty($row['donor_name'])) {
                    throw new Exception('Donor name is missing');
                }
                if (empty($row['amount'])) {
                    throw new Exception('Donation amount is missing');
                }

                // Handle Donor
                $donor = Donor::firstOrCreate(
                    ['name' => $row['donor_name']],
                    ['account_name' => $row['donor_name'] . '_' . uniqid()]
                );

                // Handle Campaign (optional)
                $campaign = isset($row['campaign']) && !empty($row['campaign'])
                    ? Campaign::firstOrCreate(['title' => $row['campaign']])
                    : null;

                // Handle Payment Method
                $paymentMethod = PaymentMethod::firstOrCreate(
                    ['name' => $row['payment_method'] ?? 'Unknown Payment Method']
                );

                // Check if paymentMethod is still null after creation (which shouldn't happen)
                if (!$paymentMethod) {
                    throw new Exception('Invalid Payment Method');
                }

                // Handle Donation Source (optional)
                $donationSource = isset($row['donation_source']) && !empty($row['donation_source'])
                    ? DonationSource::firstOrCreate(['name' => $row['donation_source']])
                    : null;

                // Save Donation record
                $donation = new Donation([
                    'donor_id' => $donor->id,
                    'campaign_id' => $campaign?->id,
                    'amount' => $row['amount'],
                    'transaction_id' => $row['transaction_id'] ?? null,
                    'receipt_no' => $row['receipt_no'] ?? $this->generateReceiptNumber(),
                    'message' => $row['message'] ?? null,
                    'payment_method_id' => $paymentMethod->id,
                    'donation_source_id' => $donationSource?->id,
                    'donation_date' => $this->parseDate($row['donation_date'] ?? now()),
                ]);
                
                $donation->save();

            } catch (Exception $e) {
                // Log error and save in failed import record
                $donorName = $row['donor_name'] ?? 'N/A';
                $message = $e->getMessage();

                // Save failed import record
                FailedImportRecord::create([
                    'account_name' => $donorName,
                    'error' => $message,
                    'row_data' => json_encode($row), // Optionally store the full row data for review
                ]);
            }
        }
    }

    private function parseDate($date)
    {
        try {
            return \Carbon\Carbon::parse($date);
        } catch (\Exception $e) {
            return now();
        }
    }

    private function generateReceiptNumber(): string
    {
        return 'DON-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -6));
    }
}
