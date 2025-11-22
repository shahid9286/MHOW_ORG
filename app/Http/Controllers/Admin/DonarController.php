<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\DonorsImport;
use App\Jobs\SendDonorEmail;
use App\Models\City;
use App\Models\Country;
use App\Models\Donor;
use App\Models\DonorEmail;
use App\Models\EmailHistory;
use App\Models\EmailTemplate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class DonarController extends Controller
{
    public function index()
    {

        $templates = EmailTemplate::all();

        $donors = Donor::with(['country', 'city'])->latest()->get();

        return view('admin.donor.index', compact('donors', 'templates'));
    }

    public function add()
    {
        $countries = Country::all();
        $cities = City::all();

        return view('admin.donor.add', compact('countries', 'cities'));
    }

    public function store(Request $request)
    {
            $request->validate([
                'name' => 'required|string|max:255',
                'last_name' => 'nullable|string',
                'email' => 'nullable|email|max:255',
                'phone' => 'nullable|string|max:15',
                'whatsapp_no' => ['nullable', 'string', 'max:15', 'regex:/^\+?[0-9]{7,15}$/'],
                'country_id' => 'nullable|exists:countries,id',
                'city_id' => 'nullable|exists:cities,id',
                'address' => 'nullable|string',
                'status' => 'required|in:active,inactive',
                'donor_type' => 'required|in:individual,corporate,recurring',
                'is_receive_email' => 'nullable|boolean',
                'created_by' => 'nullable|exists:users,id',
            ]);

        $donor = new Donor;
        $donor->name = $request->name;
        $donor->account_name = $request->last_name;
        $donor->email = $request->email;
        $donor->phone = $request->phone;
        $donor->whatsapp_no = $request->whatsapp_no;
        $donor->date_of_birth = $request->date_of_birth;
        $donor->country_id = $request->country_id;
        $donor->city_id = $request->city_id;
        $donor->address = $request->address;
        $donor->status = $request->status;
        $donor->donor_type = $request->donor_type;
        $donor->is_receive_email = $request->is_receive_email ?? true;
        $donor->created_by = auth()->id();
        $donor->save();

        $notification = [
            'message' => 'Donor Created Successfully!',
            'alert' => 'success',
        ];

        return redirect()->route('admin.donor.index')->with('notification', $notification);
    }

    public function edit($id)
    {
        $donor = Donor::findOrFail($id);
        $countries = Country::all();
        $cities = City::all();
        $users = User::all();

        return view('admin.donor.edit', compact('donor', 'countries', 'cities', 'users'));
    }

    public function update(Request $request, $id)
    {
        $donor = Donor::findOrFail($id);

        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'last_name' => 'nullable|string',
                'email' => 'nullable|email|max:255',
                'phone' => 'nullable|string|max:15',
                'whatsapp_no' => 'nullable|string|max:15',
                'country_id' => 'nullable|exists:countries,id',
                'city_id' => 'nullable|exists:cities,id',
                'address' => 'nullable|string',
                'status' => 'required|in:active,inactive',
                'donor_type' => 'required|in:individual,corporate,recurring',
                'is_receive_email' => 'nullable|boolean',
                'updated_by' => 'nullable|exists:users,id',
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        $donor->name = $request->name;
        $donor->account_name = $request->last_name;
        $donor->email = $request->email;
        $donor->phone = $request->phone;
        $donor->whatsapp_no = $request->whatsapp_no;
        $donor->date_of_birth = $request->date_of_birth;
        $donor->country_id = $request->country_id;
        $donor->city_id = $request->city_id;
        $donor->address = $request->address;
        $donor->status = $request->status;
        $donor->donor_type = $request->donor_type;
        $donor->is_receive_email = $request->is_receive_email ?? true;
        $donor->updated_by = auth()->id();
        $donor->save();

        $notification = [
            'message' => 'Donor Updated Successfully!',
            'alert' => 'success',
        ];

        return redirect()->route('admin.donor.index')->with('notification', $notification);
    }

    public function toggleStatus($id)
    {
        $Donor = Donor::findOrFail($id);
        $Donor->status = $Donor->status === 'active' ? 'inactive' : 'active';
        $Donor->save();

        return response()->json(['status' => $Donor->status]);
    }

    public function delete($id)
    {
        $donor = Donor::findOrFail($id);
        $donor->deleted_by = auth()->id();
        $donor->save();
        $donor->delete();

        $notification = [
            'message' => 'Donor Deleted Successfully!',
            'alert' => 'success',
        ];

        return redirect()->route('admin.donor.index')->with('notification', $notification);
    }

    public function getCities(Request $request)
    {
        $countryId = $request->country_id;
        $cities = City::where('country_id', $countryId)->orderBy('name')->get(['id', 'name']);

        return response()->json($cities);
    }

    public function search(Request $request)
    {

        $query = Donor::query();

        if ($request->filled('account_name')) {
            $query->where('account_name', $request->account_name);
        }
        if ($request->filled('email')) {
            $query->where('email', $request->email);
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('donor_type')) {
            $query->where('donor_type', $request->donor_type);
        }
        if ($request->filled('is_receive_email')) {
            $query->where('is_receive_email', $request->is_receive_email);
        }
        $donors = $query->get(); // or ->with('createdBy')->get() if you
        // $donors = $query->with('createdBy')->get();

        $html = view('admin.donor.table', compact('donors'))->render();

        return response()->json(['html' => $html]);
    }

    public function restorePage()
    {

        $donors = Donor::onlyTrashed()->get();

        return view('admin.donor.restore', compact('donors'));
    }

    public function restore($id)
    {
        $donar = Donor::withTrashed()->find($id);
        $donar->restore();

        $notification = [
            'message' => 'Donor Restored Successfully!',
            'alert' => 'success',
        ];

        return back()->with('notification', $notification);
    }

    public function forceDelete($id)
    {
        $donar = Donor::withTrashed()->find($id);

        $donar->forceDelete();

        $notification = [
            'message' => 'Donor Permanently Deleted Successfully!',
            'alert' => 'success',
        ];

        return back()->with('notification', $notification);
    }

    public function donarImport(Request $request)
    {
        \App\Models\FailedImportRecord::truncate();
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);
        Excel::import(new DonorsImport, $request->file('file'));

        return back()->with('success', 'Donations imported successfully!');
    }

    // public function sendEmail(Request $request)
    // {
    //     $request->validate([
    //         'template_id' => 'required|exists:email_templates,id',
    //         'donor_ids' => 'required'
    //     ]);

    //     $template = EmailTemplate::with('attachments')->findOrFail($request->template_id);
    //     $ids = array_filter(explode(',', $request->donor_ids));
    //     $donors = Donor::whereIn('id', $ids)->get();
    //     $userId = auth()->id();

    //     $successCount = 0;
    //     $failCount = 0;

    //     foreach ($donors as $donor) {
    //         if (!$donor->email || $donor->is_receive_email != 1) {
    //             continue;
    //         }

    //         // Prepare replacements
    //         $replacements = [
    //             '{{ donor_name }}' => $donor->name,
    //             '{{ donor_email }}' => $donor->email,
    //             '{{ donor_phone }}' => $donor->phone,
    //             '{{ donor_city }}' => $donor->city,
    //             '{{ donor_whatsapp }}' => $donor->whatsapp_no,
    //         ];

    //         $body = str_replace(array_keys($replacements), array_values($replacements), $template->body);

    //         try {
    //             // Get template attachments
    //             $templateAttachments = $template->attachments->pluck('file_path')->toArray();

    //             // Get donor-specific attachments if any
    //             $donorAttachments = isset($donor->attachments['file_path'])
    //                 ? (array) $donor->attachments['file_path']
    //                 : [];

    //             $allAttachments = array_merge($templateAttachments, $donorAttachments);
    //             $allAttachments = array_filter($allAttachments);

    //             // Send email with attachments
    //             // Mail::to($donor->email)->send(new DonorEmails(
    //             //     $template->subject,
    //             //     $body,
    //             //     $allAttachments
    //             // ));

    //             SendDonorEmail::dispatch(
    //                 $donor->email,
    //                 $template->subject,
    //                 $body,
    //                 $allAttachments,
    //                 $donor->id,
    //                 $template->id,
    //                 $userId
    //             );

    //             // Record email
    //             DonorEmail::create([
    //                 'donor_id' => $donor->id,
    //                 'template_id' => $template->id,
    //                 'subject' => $template->subject,
    //                 'body' => $body,
    //                 'attachment_paths' => !empty($allAttachments) ? json_encode($allAttachments) : null,
    //                 'sent_at' => now(),
    //                 'status' => 'sent',
    //                 'sent_by' => $userId,
    //                 'created_by' => $userId,
    //                 'updated_by' => $userId,
    //             ]);

    //             $successCount++;
    //         } catch (\Exception $e) {
    //             DonorEmail::create([
    //                 'donor_id' => $donor->id,
    //                 'template_id' => $template->id,
    //                 'subject' => $template->subject,
    //                 'body' => $body,
    //                 'status' => 'failed',
    //                 'sent_by' => $userId,
    //                 'created_by' => $userId,
    //                 'updated_by' => $userId,
    //             ]);

    //             \Log::error("Email failed to donor {$donor->id}: " . $e->getMessage());
    //             $failCount++;
    //         }
    //     }

    //     $message = $this->getResultMessage($successCount, $failCount);
    //     return back()->with('success', $message);
    // }

    // public function sendEmail(Request $request)
    // {
    //     $request->validate([
    //         'template_id' => 'required|exists:email_templates,id',
    //         'donor_ids' => 'required'
    //     ]);

    //     $template = EmailTemplate::with('attachments')->findOrFail($request->template_id);
    //     $ids = array_filter(explode(',', $request->donor_ids));
    //     $donors = Donor::whereIn('id', $ids)->get();
    //     $userId = auth()->id();

    //     $successCount = 0;
    //     $failCount = 0;

    //     foreach ($donors as $donor) {
    //         if (!$donor->email || $donor->is_receive_email != 1) {
    //             continue;
    //         }

    //         // Prepare replacements
    //         $replacements = [
    //             '{{ donor_name }}' => $donor->name,
    //             '{{ donor_email }}' => $donor->email,
    //             '{{ donor_phone }}' => $donor->phone,
    //             '{{ donor_city }}' => $donor->city,
    //             '{{ donor_whatsapp }}' => $donor->whatsapp_no,
    //         ];

    //         $body = str_replace(array_keys($replacements), array_values($replacements), $template->body);

    //         try {

    //             $templateAttachments = $template->attachments->pluck('file_path')->toArray();
    //             $donorAttachments = [];
    //             if (isset($donor->attachments) && is_array($donor->attachments)) {
    //                 if (isset($donor->attachments['file_path'])) {
    //                     $donorAttachments = is_array($donor->attachments['file_path'])
    //                         ? $donor->attachments['file_path']
    //                         : [$donor->attachments['file_path']];
    //                 }
    //             }

    //             $allAttachments = array_merge($templateAttachments, $donorAttachments);
    //             $allAttachments = array_filter($allAttachments);

    //              \Log::info("Controller: Attachments prepared", [
    //             'donor_id' => $donor->id,
    //             'email' => $donor->email,
    //             'attachments' => $allAttachments,
    //         ]);

    //             SendDonorEmail::dispatch(
    //                 $donor->email,
    //                 $template->subject,
    //                 $body,
    //                 $allAttachments,
    //                 $donor->id,
    //                 $template->id,
    //                 $userId
    //             );

    //             // Record email immediately with "queued" status
    //             DonorEmail::create([
    //                 'donor_id' => $donor->id,
    //                 'template_id' => $template->id,
    //                 'subject' => $template->subject,
    //                 'body' => $body,
    //                 'attachment_paths' => !empty($allAttachments) ? json_encode($allAttachments) : null,
    //                 'sent_at' => null, // Will be set when actually sent
    //                 'status' => 'queued',
    //                 'sent_by' => $userId,
    //                 'created_by' => $userId,
    //                 'updated_by' => $userId,
    //             ]);

    //             $successCount++;
    //         } catch (\Exception $e) {
    //             DonorEmail::create([
    //                 'donor_id' => $donor->id,
    //                 'template_id' => $template->id,
    //                 'subject' => $template->subject,
    //                 'body' => $body,
    //                 'status' => 'failed',
    //                 'sent_by' => $userId,
    //                 'created_by' => $userId,
    //                 'updated_by' => $userId,
    //             ]);

    //             \Log::error("Failed to queue email for donor {$donor->id}: " . $e->getMessage());
    //             $failCount++;
    //         }
    //     }

    //     $message = $this->getResultMessage($successCount, $failCount);
    //     return back()->with('success', $message);
    // }

    public function sendEmail(Request $request)
    {
         
        $request->validate([
            'template_id' => 'required|exists:email_templates,id',
            'donor_ids' => 'required',
        ]);

        $template = EmailTemplate::with('attachments')->findOrFail($request->template_id);
        $ids = array_filter(explode(',', $request->donor_ids));
        $donors = Donor::whereIn('id', $ids)->get();
        $userId = auth()->id();

        $successCount = 0;
        $failCount = 0;

        foreach ($donors as $donor) {
            if (! $donor->email || $donor->is_receive_email != 1) {
                Log::info("Skipping donor {$donor->id}: No email or not receiving emails");

                continue;
            }

            // Prepare replacements
            $replacements = [
                '{{ donor_name }}' => $donor->name,
                '{{ donor_email }}' => $donor->email,
                '{{ donor_phone }}' => $donor->phone,
                '{{ donor_city }}' => $donor->city,
                '{{ donor_whatsapp }}' => $donor->whatsapp_no,
            ];

            $body = str_replace(array_keys($replacements), array_values($replacements), $template->body);

            try {
                SendDonorEmail::dispatch(
                    $donor->email,
                    $template->subject,
                    $body,
                    $donor->id,
                    $template->id,
                    $userId
                );

                // Record email immediately with "queued" status
                DonorEmail::create([
                    'donor_id' => $donor->id,
                    'template_id' => $template->id,
                    'subject' => $template->subject,
                    'body' => $body,
                    'sent_at' => null,
                    'status' => 'queued',
                    'sent_by' => $userId,
                    'created_by' => $userId,
                    'updated_by' => $userId,
                ]);

                $successCount++;
                Log::info("Email queued successfully for donor {$donor->id}");

            } catch (\Exception $e) {
                DonorEmail::create([
                    'donor_id' => $donor->id,
                    'template_id' => $template->id,
                    'subject' => $template->subject,
                    'body' => $body,
                    'status' => 'failed',
                    'sent_by' => $userId,
                    'created_by' => $userId,
                    'updated_by' => $userId,
                ]);
                Log::error("Failed to queue email for donor {$donor->id}: ".$e->getMessage());
                $failCount++;
            }
        }
        $message = $this->getResultMessage($successCount, $failCount);

        $notification = [
            'message' => $message,
            'alert' => $successCount > 0 ? 'success' : 'error',
        ];

        return back()->with('notification', $notification);
    }

    private function getResultMessage($successCount, $failCount)
    {
        if ($successCount > 0 && $failCount > 0) {
            return "{$successCount} email(s) queued successfully, {$failCount} failed.";
        } elseif ($successCount > 0) {
            return "{$successCount} email(s) queued successfully.";
        } else {
            return 'No emails were queued. All failed or no valid donors.';
        }
    }

    public function emailSent()
    {
       $donorEmails = EmailHistory::with('template', 'emailable', 'sender')->latest()->get();

        return view('admin.donor.email-sent', compact('donorEmails'));
    }

    public function attachments($id)
    {
        $email = DonorEmail::findOrFail($id);

        $attachments = [];
        if ($email->attachment_paths) {
            $paths = json_decode($email->attachment_paths, true);

            if (is_array($paths)) {
                foreach ($paths as $path) {
                    $attachments[] = asset($path);
                }
            }
        }

        return response()->json([
            'attachments' => $attachments,
        ]);
    }

    public function runBirthdayEmails(Request $request)
    {
        $exitCode = Artisan::call('donors:birthday-emails');
        // Optional: Get output
        $output = Artisan::output();

        return redirect()->back()->with('success', 'Birthday email command was run!');
    }
}
