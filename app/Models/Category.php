<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Trans;


class Category extends Model
{
    use HasFactory, Trans;

    protected $guarded = [];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    // Many to Many Provider => Provider

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function getImgPathAttribute()
    {

        $src = asset('default.jpg');
        if ($this->image) {
            $src = asset('images/' . $this->image->path);
        }

        return $src;
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
