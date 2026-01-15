<?php

namespace App\Filament\Resources\Produks\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ProdukForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                FileUpload::make('thumb')
                    ->label("thumbnail Produk")
                    ->directory("thumbProduks-photos")
                    ->image()
                    ->required(),
                Repeater::make("photos")
                ->relationship("photos")
                ->schema([
                    FileUpload::make("photo")
                    ->image()
                    ->directory("photo-products")
                    ->disk("public"),
                ]),
                Textarea::make('about')
                    ->label("tentang")
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('price')
                    ->label("harga")
                    ->currencyMask()
                    ->required()
                    ->numeric()
                    ->prefix('Rp'),
                TextInput::make('stock')
                    ->required()
                    ->numeric(),
                Select::make('category_id')
                    ->label("kategori")
                    ->relationship('category', 'name')
                    ->required(),
                Select::make('brand_id')
                    ->label("merek")
                    ->relationship('brand', 'name')
                    ->required(),
            ]);
    }
}
