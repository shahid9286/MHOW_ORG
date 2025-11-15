<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebProject extends Model
{
    public function pcategory()
    {
        return $this->belongsTo(PCategory::class, 'pcategory_id');
    }
}
