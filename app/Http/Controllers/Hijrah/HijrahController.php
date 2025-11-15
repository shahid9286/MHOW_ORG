<?php

namespace App\Http\Controllers\Hijrah;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventExtraField;
use App\Models\EventTicket;

class HijrahController extends Controller
{
    public function index()
    {
        
        $event = Event::where('slug', 'hijrah')->first();
        $fields = EventExtraField::where('event_id', $event->id)->get();
        $tickets = EventTicket::where('event_id', $event->id)->get();

        return view('hijrah.index', compact('event', 'tickets', 'fields'));
    }
}
