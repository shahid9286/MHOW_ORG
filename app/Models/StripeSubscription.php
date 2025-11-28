<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StripeSubscription extends Model
{
     protected $fillable = [
        'user_id',
        'stripe_customer_id',
        'stripe_subscription_id',
        'stripe_price_id',
        'name',
        'email',
        'phone',
        'status',
    ];
}
