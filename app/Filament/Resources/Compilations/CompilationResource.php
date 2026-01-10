<?php

namespace App\Filament\Resources\Compilations;

use App\Filament\Resources\Compilations\Pages\CreateCompilation;
use App\Filament\Resources\Compilations\Pages\EditCompilation;
use App\Filament\Resources\Compilations\Pages\ListCompilations;
use App\Filament\Resources\Compilations\Schemas\CompilationForm;
use App\Filament\Resources\Compilations\Tables\CompilationsTable;
use App\Models\Compilation;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CompilationResource extends Resource
{
    protected static ?string $model = Compilation::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedQueueList;

    protected static ?int $navigationSort = 20;

    public static function getNavigationLabel(): string
    {
        return __('Compilations');
    }

    public static function getModelLabel(): string
    {
        return __('Compilation');
    }

    public static function getPluralLabel(): ?string
    {
        return __('Compilations');
    }

    public static function form(Schema $schema): Schema
    {
        return CompilationForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CompilationsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCompilations::route('/'),
            'create' => CreateCompilation::route('/create'),
            'edit' => EditCompilation::route('/{record}/edit'),
        ];
    }
}
