<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class user_details extends Model
{
    protected $fillable = [
        'name',
        'email',
        'user_id',
        'country',
        'state',
        'city',
        'address_line_1',
        'address_line_2',
        'postal_code',
        'date_of_birth',
        'gender',
        'registered_to_raise_funds',
    ];
    use HasFactory;
}
