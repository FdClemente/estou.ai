<?php

namespace App\Filament\Resources\TestimonialResource\Pages;

use App\Filament\Resources\TestimonialResource;
use Filament\Resources\Pages\ManageRecords;

/**
 * ManageTestimonials
 *
 * Provides CRUD operations for testimonials. Administrators can add,
 * edit and delete client feedback.
 */
class ManageTestimonials extends ManageRecords
{
    protected static string $resource = TestimonialResource::class;
}