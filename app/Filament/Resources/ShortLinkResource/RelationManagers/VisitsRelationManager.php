<?php

namespace App\Filament\Resources\ShortLinkResource\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class VisitsRelationManager extends RelationManager
{
    protected static string $relationship = 'visits';

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('ip_address')
            ->columns([
                Tables\Columns\TextColumn::make('ip_address')
                    ->label('IP адрес'),
                Tables\Columns\TextColumn::make('visited_at')
                    ->label('Дата перехода'),
            ]);
    }
}
