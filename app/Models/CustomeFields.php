<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Trans;


class CustomeFields extends Model
{
    use HasFactory, Trans;
    protected $guarded = [];

    public function service() {
        return $this->belongsTo(Service::class)->withDefault();
    }
    
}
