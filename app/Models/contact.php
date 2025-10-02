<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['site_id', 'address', 'phone', 'email'];

    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}

