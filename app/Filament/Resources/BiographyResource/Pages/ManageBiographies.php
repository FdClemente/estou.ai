<?php

namespace App\Filament\Resources\BiographyResource\Pages;

use App\Filament\Resources\BiographyResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

/**
 * ManageBiographies
 *
 * Exposes a CRUD interface for biographies. Administrators can create,
 * update or delete biography entries. Typically only one record will be
 * present. The Filament resource uses text areas for the content.
 */
class ManageBiographies extends ManageRecords
{
    protected static string $resource = BiographyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
