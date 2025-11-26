<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendingBooking extends Model
{
    protected $fillable = [
        'event_id',
        'ticket_id',
        'paypal_order_id',
        'name',
        'email',
        'phone_no',
        'gender',
        'date_of_birth',
        'extra_data',
        'donation_amount',
        'payment_gateway',
        'payment_method_id',
    ];

    protected $casts = [
        'extra_data' => 'array',
        'donation_amount' => 'decimal:2',
    ];

    // Relations
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function ticket()
    {
        return $this->belongsTo(EventTicket::class, 'ticket_id');
    }
}
