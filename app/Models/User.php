<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'name',
        'email',
        'password',
        'password2',
        'mobile',
        's_no_to',
        's_no_from',
        'section_id',
        'part_id',
        'polling_id',
        'deleted_at',
        'is_active',
        'parshad_id',
        'type',
        'state',
        'city',
        'nnn_id',
        'nn_id',
        'ward_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'deleted_at' => 'datetime',
    ];

    // function setPasswordAttribute($value)
    // {
    //     return $this->attributes['password'] = Hash::make($value);
    // }
    function setNameAttribute($value)
    {
        return $this->attributes['name'] = ucwords($value);
    }
    function setEmailAttribute($value)
    {
        return $this->attributes['email'] = strtolower($value);
    }
    function part_nos()
    {
        return $this->belongsTo(PartNo::class, 'part_id');
    }
    function sections()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
    function parshads()
    {
        return $this->belongsTo(User::class, 'parshad_id');
    }
    function cities()
    {
        return $this->belongsTo(City::class, 'city');
    }
    function wards()
    {
        return $this->belongsTo(Ward::class, 'ward_id');
    }
}
