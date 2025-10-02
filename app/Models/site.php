<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Site extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'theme'];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }

    public function contents()
    {
        return $this->hasMany(Content::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function programs()
    {
        return $this->hasMany(Program::class);
    }

    public function admins()
    {
        return $this->belongsToMany(Admin::class, 'admin_site');
    }
}

