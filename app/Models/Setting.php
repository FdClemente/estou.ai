<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Setting model
 *
 * Represents global configuration for the portfolio such as the tagline in
 * multiple languages. Only one record is expected but the model is not
 * restricted to one row to allow future extension.
 */
class Setting extends Model
{
    use HasFactory;

    /**
     * Mass assignable attributes.
     *
     * @var array<int,string>
     */
    protected $fillable = [
        'tagline_pt',
        'tagline_en',
    ];
}