<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProperty extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $guarded = [];

    public $casts = [
        'allowed_values' => 'array',
    ];
}
