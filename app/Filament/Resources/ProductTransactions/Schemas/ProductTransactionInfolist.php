<?php

namespace App\Filament\Resources\ProductTransactions\Schemas;

use App\Models\ProductTransaction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ProductTransactionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('phone'),
                TextEntry::make('email')
                    ->label('Email address'),
                TextEntry::make('booking_trx_id'),
                TextEntry::make('city'),
                TextEntry::make('post_code'),
                ImageEntry::make('proof')
                    ->label("bukti transaksi"),
                TextEntry::make('produk_size')
                    ->numeric(),
                TextEntry::make('address')
                    ->columnSpanFull(),
                TextEntry::make('quantity')
                    ->numeric(),
                TextEntry::make('subTotal_amount')
                    ->numeric(),
                TextEntry::make('grand_total_amount')
                    ->numeric(),
                IconEntry::make('is_paid')
                    ->label("status paid")
                    ->boolean(),
                TextEntry::make('promoCode.id')
                    ->label('Promo code')
                    ->placeholder('-'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (ProductTransaction $record): bool => $record->trashed()),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
