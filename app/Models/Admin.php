<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'mobile',
        'password',
        'email',
        'state',
        'city',
        'nnn_id',
        'nn_id',
        'ward_id',
        'type',
        'deleted_at',
        'is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'deleted_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'deleted_at' => 'datetime',
    ];


    function setPasswordAttribute($value)
    {
        return $this->attributes['password'] = Hash::make($value);
    }
    function setNameAttribute($value)
    {
        return $this->attributes['name'] = ucwords($value);
    }
    function setEmailAttribute($value)
    {
        return $this->attributes['email'] = strtolower($value);
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
