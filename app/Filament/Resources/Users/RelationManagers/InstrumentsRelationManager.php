<?php

namespace App\Filament\Resources\Users\RelationManagers;

use App\Models\Scopes\OwnedByUserScope;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class InstrumentsRelationManager extends RelationManager
{
    protected static string $relationship = 'instruments';

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->defaultSort('sort')
            // remove the tenant-isolation global scope in this one place to let admins see users' instruments
            ->modifyQueryUsing(fn (Builder $query) => $query->withoutGlobalScopes([
                OwnedByUserScope::class,
            ]))
            ->columns([
                TextColumn::make('name')->label(__('Name'))->searchable()->sortable(),
                TextColumn::make('collections_count')->label(__('Collections'))->counts('collections')->sortable(),
                TextColumn::make('created_at')->label(__('Created at'))->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')->label(__('Updated at'))->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->headerActions([
            ])
            ->recordActions([
            ])
            ->toolbarActions([
            ]);
    }
}
