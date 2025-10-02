<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = ['site_id', 'author', 'content'];

    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}

