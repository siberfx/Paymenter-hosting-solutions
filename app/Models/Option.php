<?php

namespace App\Models;

use App\Models\Traits\Priceable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Option extends Model
{
    use HasFactory;
    use Priceable;

    public $timestamps = false;

    protected $guarded = [];

    /**
     * Get the price of the option.
     */
    public function price(): MorphOne
    {
        return $this->morphOne(Price::class, 'priceable');
    }
}
