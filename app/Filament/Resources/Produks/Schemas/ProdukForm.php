<?php

namespace App\Filament\Resources\Produks\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Symfony\Component\Console\Completion\Suggestion;

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
                    ->nullable()
                    ->disk("public"),
                ])->addActionLabel("tambahkan foto")
                ->defaultItems(0),
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
                Repeater::make("sizes")
                    ->relationship("sizes")
                    ->schema([
                    TextInput::make("size"),
                    ])


            ]);
    }
}
