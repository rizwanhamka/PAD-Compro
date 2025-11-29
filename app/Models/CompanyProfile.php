<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    use HasFactory;

    protected $table = 'company_profile';

    protected $fillable = [
        'site_id',
        'title',
        'nama',
        'deskripsi',
        'about_us',
        'carousel_1',
        'carousel_2',
        'carousel_3',
        'youtube',
        'phone',
        'email',
        'alamat',
    ];

    /**
     * Optional relationship if you have a Site model.
     */
    public function site()
    {
        return $this->belongsTo(Site::class, 'site_id');
    }
}
