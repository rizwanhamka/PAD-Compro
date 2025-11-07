<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Program extends Model
{
    use HasFactory;

    protected $fillable = ['site_id', 'name', 'description', 'link', 'image'];


    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}
