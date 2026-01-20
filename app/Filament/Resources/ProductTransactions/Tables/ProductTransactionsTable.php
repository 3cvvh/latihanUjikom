<?php

namespace App\Filament\Resources\ProductTransactions\Tables;

use App\Filament\Resources\ProductTransactions\Actions\ApproveAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProductTransactionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('phone')
                    ->label("nomor")
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),
                TextColumn::make('booking_trx_id')
                    ->label("transaksi ID")
                    ->searchable(),
                TextColumn::make('promoCode.discountamount')
                    ->prefix("Rp ")
                    ->numeric()
                    ->default("tidak megunakan promocode")
                    ->searchable(),
                TextColumn::make("grand_total_amount")
                ->label("total")
                ->prefix("Rp ")
                ->numeric()
                ->searchable(),
                TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                ApproveAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
