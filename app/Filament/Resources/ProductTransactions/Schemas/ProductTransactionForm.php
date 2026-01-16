<?php

namespace App\Filament\Resources\ProductTransactions\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProductTransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('phone')
                    ->tel()
                    ->numeric()
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('city')
                    ->required(),
                TextInput::make('post_code')
                    ->required(),
                FileUpload::make('proof')
                    ->image()
                    ->required(),
                TextInput::make('produk_size')
                    ->required()
                    ->numeric()
                    ->label("ukuran sepatu"),
                Textarea::make('address')
                    ->required()
                    ->label("alamat")
                    ->columnSpanFull(),
                TextInput::make('quantity')
                    ->label("jumlah barang")
                    ->required()
                    ->numeric(),
                Toggle::make('is_paid')
                    ->label("status bayar")
                    ->required(),
                Select::make('id_produk')
                    ->relationship("produk","name")
                    ->required(),
                Select::make('promo_code_id')
                    ->relationship('promoCode', 'code')
                    ->nullable(),
            ]);
    }
}
