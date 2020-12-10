<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EROData extends Model
{
    use HasFactory;
    protected $appends = [
        'url'
    ];

    function getUrlAttribute()
    {
        return $this->path ? url($this->path) : '';
    }
}
