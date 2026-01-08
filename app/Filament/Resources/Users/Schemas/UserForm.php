<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Models\User;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->label(__('Name'))->required()->maxLength(255),
                TextInput::make('email')->label(__('Email'))->required()->email()->maxLength(255),

                TextInput::make('password')
                    ->label(__('Password'))
                    ->password()
                    ->required(fn (string $context) => $context === 'create')
                    ->dehydrateStateUsing(fn ($state) => $state ? Hash::make($state) : null)
                    ->dehydrated(fn ($state) => filled($state)),

                Toggle::make('is_admin')->label(__('Admin'))->inline(false)
                    ->disabled(fn (?User $record) => $record && $record->id === auth()->id())
                    ->helperText(fn (?User $record) => $record && $record->id === auth()->id()
                        ? 'You cannot remove your own admin status'
                        : null)
            ]);
    }
}
