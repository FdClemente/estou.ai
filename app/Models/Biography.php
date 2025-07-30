<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Biography model
 *
 * Stores the developer biography in Portuguese and English. It is expected
 * there will only be one row, but multiple biographies are allowed for
 * versioning or segmentation if needed.
 */
class Biography extends Model
{
    use HasFactory;

    /**
     * Mass assignable attributes.
     *
     * @var array<int,string>
     */
    protected $fillable = [
        'biography_pt',
        'biography_en',
    ];
}