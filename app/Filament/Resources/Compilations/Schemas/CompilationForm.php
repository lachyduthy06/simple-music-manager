<?php

namespace App\Filament\Resources\Compilations\Schemas;

use App\Models\Compilation;
use App\Models\Piece;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CompilationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->label(__('Name'))->required()->maxLength(255),

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
}
