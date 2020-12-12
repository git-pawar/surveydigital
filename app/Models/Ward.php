<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;
    function part_nos()
    {
        return $this->hasMany(PartNo::class, 'ward_id');
    }
}
