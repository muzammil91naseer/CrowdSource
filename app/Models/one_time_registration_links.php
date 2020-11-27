<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class one_time_registration_links extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'token',
        'is_expired',
        
    ];

    protected $casts = 
    [
        'registered_at' => 'datetime',
    ];
}
