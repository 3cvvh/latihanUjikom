<?php

namespace App\Filament\Resources\ProductTransactions\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Wizard;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Wizard\Step;


class ProductTransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Wizard::make([
                    Step::make("data")
                    ->schema([
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
                         Textarea::make('address')
                            ->required()
                            ->label("alamat")
                            ->columnSpanFull(),
                    ]),
                    Step::make("dataproduk")
                    ->schema([
                        TextInput::make('produk_size')
                            ->required()
                            ->numeric()
                            ->label("ukuran sepatu"),
                            TextInput::make('quantity')
                                ->label("jumlah barang")
                                ->required()
                                ->numeric(),
                                Select::make('id_produk')
                                    ->relationship("produk","name")
                                    ->required(),
                    ]),
                    Step::make("pembayaran")
                        ->schema([
                            FileUpload::make('proof')
                            ->directory("proofs")
                            ->image()
                            ->required(),
                            Toggle::make('is_paid')
                                ->label("status bayar")
                                ->required(),
                            Select::make('promo_code_id')
                                ->relationship('promoCode', 'code')
                                ->nullable(),
                        ]),
                ])->skippable()
            ]);
    }
}
