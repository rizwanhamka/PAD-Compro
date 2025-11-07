<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $table = 'staffs';
    protected $fillable = [
        'name',
        'site_id',
        'nip',
        'role',
        'email',
        'instagram',
        'facebook',
        'linkedin',
        'blog',
        'photo',
    ];
}
