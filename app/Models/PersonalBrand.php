<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalBrand extends Model
{
    protected $guarded = [
        'personalBrand_id'
    ];

    protected $fillable = ['nama', 'nim', 'email', 'github', 'linkPortfolio', 'goal', 'phone', 'image',];
}
