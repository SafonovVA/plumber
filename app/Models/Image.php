<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Resizable;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Image extends Model
{
    use Resizable;

    public $timestamps = false;

    /*public function path(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => 'storage/' . $value,
        );
    }*/
}
