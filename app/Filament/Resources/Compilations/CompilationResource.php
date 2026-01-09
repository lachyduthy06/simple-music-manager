<?php

namespace App\Filament\Resources\Compilations;

use App\Enums\CompilationStatus;
use App\Filament\Resources\Compilations\Pages\ManageCompilations;
use App\Models\Compilation;
use App\Models\Piece;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
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
        return $schema
            ->components([
                TextInput::make('name')->label(__('Name'))->required()->maxLength(255),

                Select::make('status')
                    ->label(__('Status'))
                    ->options(CompilationStatus::options())
                    ->default(CompilationStatus::NOT_PLAYABLE_YET->value)
                    ->selectablePlaceholder(false)
                    ->required(),

                Select::make('pieces')
                    ->label(__('Pieces'))
                    ->relationship(name: 'pieces', titleAttribute: 'name')
                    ->multiple()
                    ->reorderable()
                    ->searchable()
                    ->preload()
                    ->noOptionsMessage('No pieces available.')
                    ->getOptionLabelFromRecordUsing(function (Piece $piece) {
                        // Ensure collection and instrument are loaded
                        $piece = $piece->loadMissing('collection.instrument');

                        $instrumentName = $piece->collection?->instrument?->name ?? 'No instrument';
                        $collectionName = $piece->collection?->name ?? 'No collection';

                        return "{$piece->name} [{$instrumentName}, {$collectionName}]";
                    })
                    ->saveRelationshipsUsing(function (Compilation $record, array $state) {
                        $syncData = [];
                        foreach ($state as $index => $pieceId) {
                            $syncData[$pieceId] = ['sort' => $index];
                        }
                        $record->pieces()->sync($syncData);
                    }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->reorderable('sort')
            ->defaultSort('sort')
            ->columns([
                TextColumn::make('name')->label(__('Name'))->searchable()->sortable(),
                TextColumn::make('status')
                    ->label(__('Status'))
                    ->badge()
                    ->formatStateUsing(fn (CompilationStatus $state) => $state->label())
                    ->color(fn (CompilationStatus $state) => match ($state) {
                        CompilationStatus::PLAYABLE => 'success',
                        CompilationStatus::WORKING_ON_IT => 'warning',
                        CompilationStatus::NOT_PLAYABLE_YET => 'gray',
                    })
                    ->sortable(),
                TextColumn::make('pieces_count')->label(__('Pieces'))->counts('pieces'),
                TextColumn::make('created_at')->label(__('Created at'))->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')->label(__('Updated at'))->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageCompilations::route('/'),
        ];
    }
}
