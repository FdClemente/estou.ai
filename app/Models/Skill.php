<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Skill model
 *
 * Represents a technology or competency. Names and descriptions are stored
 * separately for Portuguese and English. The optional icon field stores the
 * CSS class, heroicon identifier or filename for the skill's icon.
 */
class Skill extends Model
{
    use HasFactory;

    /**
     * Mass assignable attributes.
     *
     * @var array<int,string>
     */
    protected $fillable = [
        'name_pt',
        'name_en',
        'description_pt',
        'description_en',
        'icon',
    ];
}