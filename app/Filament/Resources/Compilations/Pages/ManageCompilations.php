<?php

namespace App\Filament\Resources\Compilations\Pages;

use App\Filament\Resources\Compilations\CompilationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageCompilations extends ManageRecords
{
    protected static string $resource = CompilationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->label(__('Create')),
        ];
    }
}
