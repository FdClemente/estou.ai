<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * Testimonial model
 *
 * Stores client feedback. Comments are available in Portuguese and English. The
 * optional image attribute may point to a client photo stored in the
 * filesystem.
 */
class Testimonial extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;


    /**
     * Mass assignable attributes.
     *
     * @var array<int,string>
     */
    protected $fillable = [
        'name',
        'position',
        'comment_pt',
        'comment_en',
        'image',
    ];
}
