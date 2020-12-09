<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoothData extends Model
{
    use HasFactory;
    protected $fillable = [
        'parshad_id',
        'agent_id',
        'ward_id',
        'part_id',
        's_no',
        'deleted_at'
    ];
}
