<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UkActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo',
        'city',
        'events',
        'locations',
        'people',
        'order',
        'status',
    ];
}
