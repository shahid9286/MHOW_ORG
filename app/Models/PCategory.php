<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PCategory extends Model
{
    public function webProjects()
    {
        return $this->hasMany(WebProject::class, 'pcategory_id');
    }
}
