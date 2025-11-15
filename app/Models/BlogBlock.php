<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogBlock extends Model
{
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    public function features()
    {
        return $this->hasMany(BlogBlockFeature::class);
    }
}
