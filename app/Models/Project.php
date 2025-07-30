<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Project model
 *
 * Represents a portfolio project with multilingual titles and descriptions.
 * Technologies are stored as a comma separated string. Images should be
 * uploaded and stored in the public or storage directory; the path is saved
 * in the image attribute. Projects may optionally link to external pages.
 */
class Project extends Model
{
    use HasFactory;

    /**
     * Mass assignable attributes.
     *
     * @var array<int,string>
     */
    protected $fillable = [
        'title_pt',
        'title_en',
        'slug',
        'description_pt',
        'description_en',
        'date',
        'technologies',
        'image',
        'link',
    ];
}