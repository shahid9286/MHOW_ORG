<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogSetting extends Model
{
    protected $fillable= ['blog_id', 'reference_id', 'reference_type', 'order_no'];

    public function reference()
    {
        return $this->morphTo();
    }
}
