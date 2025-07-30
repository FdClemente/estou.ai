<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use Filament\Resources\Pages\ManageRecords;

/**
 * ManageSettings
 *
 * Provides an interface for creating, editing and deleting setting rows. While
 * only one record is expected, this generic manager allows multiple rows if
 * needed. The title can be customised via translations.
 */
class ManageSettings extends ManageRecords
{
    protected static string $resource = SettingResource::class;
}