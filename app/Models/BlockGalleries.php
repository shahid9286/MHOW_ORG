<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlockGalleries extends Model
{
    public function block()
    {
        return $this->belongsTo(Block::class);
    }

    protected $fillable = [
        'block_id',
        'image',
        'order_no',
    ];

}
