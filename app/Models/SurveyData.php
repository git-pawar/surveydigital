<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyData extends Model
{
    use HasFactory;

    protected $fillable = [
        'parshad_id',
        'surveyor_id',
        'mobile',
        'cast',
        'ward_no',
        'part_no',
        'ward_id',
        'part_id',
        's_no',
        'category',
        'house_no',
        'name',
        'voter_count',
        'red_green_blue',
    ];
}
