<?php

namespace App\Filament\Resources\ProjectResource\Pages;

use App\Filament\Resources\ProjectResource;
use Filament\Resources\Pages\ManageRecords;

/**
 * ManageProjects
 *
 * Provides a CRUD interface for projects. Administrators can create, edit
 * and delete portfolio projects, including uploading images and specifying
 * external links.
 */
class ManageProjects extends ManageRecords
{
    protected static string $resource = ProjectResource::class;
}