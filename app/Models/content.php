<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Content extends Model
{
    use HasFactory;

    protected $fillable = ['site_id', 'title', 'body', 'image'];

    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}
