<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonorEmail extends Model
{
    use HasFactory;

    protected $fillable = [
        'donor_id',
        'template_id',
        'subject',
        'body',
        'attachment_paths',
        'sent_at',
        'status',
        'sent_by',
        'created_by',
        'updated_by',
    ];

    public function template()
    {
        return $this->belongsTo(EmailTemplate::class);
    }

    public function donor()
    {
        return $this->belongsTo(Donor::class);
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sent_by', 'id');
    }
}
