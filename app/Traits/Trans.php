<?php

namespace App\Traits;


trait Trans
{

    public function getTransNameAttribute()
    {
        return  json_decode($this->name, true)[app()->getLocale()] ?? '';
    }

    public function getNameEnAttribute()
    {
        return  json_decode($this->name, true)['en'] ?? '';
    }

    public function getNameArAttribute()
    {
        return  json_decode($this->name, true)['ar'] ?? '';
    }

    /***************************/


    public function getTransLabelAttribute()
    {
        return  json_decode($this->label, true)[app()->getLocale()] ?? '';
    }

    public function getLabelEnAttribute()
    {
        return  json_decode($this->label, true)['en'] ?? '';
    }

    public function getLabelArAttribute()
    {
        return  json_decode($this->label, true)['ar'] ?? '';
    }

    /***************************/

    public function getTransOptionsAttribute()
    {
        return  json_decode($this->options, true)[app()->getLocale()] ?? [];
    }

    public function getOptionsEnAttribute()
    {
        return  json_decode($this->options, true)['en'] ?? [];
    }

    public function getOptionsArAttribute()
    {
        return  json_decode($this->options, true)['ar'] ?? [];
    }
}
