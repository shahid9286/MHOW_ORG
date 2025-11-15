<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\SendGeneralEmailJob;
use App\Models\Booking;
use App\Models\Donor;
use App\Models\EmailTemplate;
use App\Models\Event;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $bookings = Booking::latest()->limit(50)->get();
        $events = Event::all();
        $templates = EmailTemplate::all();

        return view('admin.booking.index', compact('bookings', 'events', 'templates'));
    }

    public function detail($id)
    {
        $booking = Booking::find($id);

        return view('admin.booking.detail', compact('booking'));
    }

    public function delete($id)
    {
        $booking = Booking::find($id);
        $booking->bookingFieldValues()->delete();
        $booking->delete();

        $notification = [
            'message' => 'Booking Deleted Successfully!',
            'alert' => 'success',
        ];

        return redirect()->route('admin.booking.index')->with('notification', $notification);
    }

    public function search(Request $request)
    {
        $query = Booking::query();

        if ($request->filled('name')) {
            $query->where('name', 'like', '%'.$request->name.'%');
        }

        if ($request->filled('event_id')) {
            $query->where('event_id', $request->event_id);
        }

        if ($request->filled('event_type')) {
            $query->where('event_type', $request->event_type);
        }

        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        $bookings = $query->get();

        $html = view('admin.booking.table', compact('bookings'))->render();

        return response()->json(['html' => $html]);
    }

    public function eventWiseBookings($slug)
    {
        $events = Event::select('id', 'title')->get();
        $event_id = Event::where('slug', $slug)->first()->id;
        $bookings = Booking::where('event_id', $event_id)->with('event')->select('id', 'event_id', 'schedule_title', 'name', 'email', 'phone_no')->get();
        $templates = EmailTemplate::all();

        return view('admin.booking.index', compact('bookings', 'event_id', 'events', 'templates'));
    }

    // public function sendGeneralEmails(Request $request)
    // {
    //     $request->validate([
    //         'template_id' => 'required|exists:email_templates,id',
    //         'type' => 'required|in:donor,booking',
    //         'donor_ids' => 'required',
    //     ]);

    //     $template = EmailTemplate::with('attachments')->findOrFail($request->template_id);
    //     $userId = auth()->id();

    //     $donorIds = is_array($request->donor_ids)
    //         ? $request->donor_ids
    //         : explode(',', $request->donor_ids);

    //     if ($request->type === 'donor') {
    //         $models = Donor::whereIn('id', $donorIds)
    //             ->whereNotNull('email')
    //             ->get();
    //     } elseif ($request->type === 'booking') {
    //         $models = Booking::with('event')
    //             ->whereIn('id', $donorIds)
    //             ->whereNotNull('email')
    //             ->get();
    //     } else {
    //         $models = collect();
    //     }

    //     if ($models->isEmpty()) {
    //         return back()->with('error', 'No valid records found with email addresses.');
    //     }

    //     $queuedCount = 0;
    //     $attachments = $template->attachments->map(fn ($a) => [
    //         'file_name' => $a->file_name,
    //         'file_path' => $a->file_path,
    //     ])->toArray();

    //     $queuedCount = 0;
    //     foreach ($models as $model) {
    //         SendGeneralEmailJob::dispatch(
    //             get_class($model),
    //             $model->id,
    //             $template->id, // Pass only template ID
    //             $userId,
    //             $attachments
    //         );
    //         $queuedCount++;
    //     }

    //     return back()->with('notification', [
    //         'alert' => 'success',
    //         'message' => "{$queuedCount} email(s) queued successfully!",
    //     ]);
    // }
    public function sendGeneralEmails(Request $request)
    {
        $request->validate([
            'template_id' => 'required|exists:email_templates,id',
            'type' => 'required|in:donor,booking',
            'donor_ids' => 'required',
        ]);

        $template = EmailTemplate::with('attachments')->findOrFail($request->template_id);
        $userId = auth()->id();

        $donorIds = is_array($request->donor_ids)
            ? $request->donor_ids
            : explode(',', $request->donor_ids);

        if ($request->type === 'donor') {
            $models = Donor::whereIn('id', $donorIds)
                ->whereNotNull('email')
                ->get();
        } elseif ($request->type === 'booking') {
            $models = Booking::with('event')
                ->whereIn('id', $donorIds)
                ->whereNotNull('email')
                ->get();
        } else {
            $models = collect();
        }

        if ($models->isEmpty()) {
            return back()->with('error', 'No valid records found with email addresses.');
        }

        $queuedCount = 0;
        $attachments = $template->attachments->map(fn ($a) => [
            'file_name' => $a->file_name,
            'file_path' => $a->file_path,
        ])->toArray();

        $queuedCount = 0;
        foreach ($models as $model) {
            SendGeneralEmailJob::dispatch(
                get_class($model),
                $model->id,
                $template->id, // Pass only template ID
                $userId,
                $attachments
            );
            $queuedCount++;
        }

        return back()->with('notification', [
            'alert' => 'success',
            'message' => "{$queuedCount} email(s) queued successfully!",
        ]);
    }
}
