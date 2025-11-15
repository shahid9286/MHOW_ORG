<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmailHistory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'template_id',
        'emailable_id',
        'emailable_type',
        'subject',
        'body',
        'attachments',
        'status',
        'sent_at',
        'sent_by',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $casts = [
        'attachments' => 'array',
        'sent_at' => 'datetime',
    ];

    public function emailable()
    {
        return $this->morphTo();
    }

    // ✅ Template relationship
    public function template()
    {
        return $this->belongsTo(EmailTemplate::class);
    }

    // ✅ Sender (User who sent)
    public function sender()
    {
        return $this->belongsTo(User::class, 'sent_by');
    }
}
