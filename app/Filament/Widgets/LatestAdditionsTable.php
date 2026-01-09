<?php

namespace App\Filament\Widgets;

use App\Models\Piece;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Builder;

class LatestAdditionsTable extends TableWidget
{
    protected int | string | array $columnSpan = 'full';

    protected function getTableHeading(): string|Htmlable|null
    {
        return __('Latest additions');
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => Piece::query()->latest()->limit(10))
            ->paginated(false)
            ->columns([
                TextColumn::make('name')->label(__('Name')),
                TextColumn::make('artist')->label(__('Artist')),
                TextColumn::make('collection.name')->label(__('Collection')),
                TextColumn::make('collection.instrument.name')->label(__('Instrument')),
                TextColumn::make('created_at')->label(__('Created'))->since(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->recordActions([
                //
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}
