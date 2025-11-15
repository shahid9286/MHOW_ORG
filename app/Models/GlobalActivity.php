<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GlobalActivity extends Model
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
