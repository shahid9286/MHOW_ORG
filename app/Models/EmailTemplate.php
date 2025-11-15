<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmailTemplate extends Model
{
    use HasFactory;
   

    protected $fillable = [
        'title',
        'subject',
        'body',
        'is_active',
        'slug',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    // Attachments relationship
    public function attachments()
    {
        return $this->hasMany(EmailAttachment::class, 'template_id');
    }

    // Donor Emails (optional but useful)
    public function donorEmails()
    {
        return $this->hasMany(DonorEmail::class, 'template_id');
    }
}
