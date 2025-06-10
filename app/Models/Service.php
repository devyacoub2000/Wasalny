<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Traits\Trans;

class Service extends Model
{
    use HasFactory, Trans;
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault();
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function custome_fields()
    {
        return $this->hasMany(CustomeFields::class);
    }

    public function service_requests()
    {
        return $this->hasMany(ServiceRequest::class);
    }

    public function getImgPathAttribute()
    {

        $src = asset('default.jpg');

        if ($this->image) {
            $src = asset('images/' . $this->image->path);
        }

        return $src;
    }
}
