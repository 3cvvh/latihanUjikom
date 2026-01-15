<?php

namespace App\Filament\Resources\Produks\Schemas;

use App\Models\Produk;
use Filament\Forms\Components\Repeater;
use Filament\Infolists\Components\ImageEntry;
// use Filament\Infolists\Components\Entries\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\ImageColumn;
use Nette\Utils\Image;

class ProdukInfolist
{
    private $num = 0;
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                ImageEntry::make('thumb')
                ->label("thumbnail"),
                ImageEntry::make("photos")
                ->label("fotoProduk")
                ->getStateUsing(fn($record) => $record->photos->pluck('photo')->toArray() )
                ->height(120)
                ->width(120),
                TextEntry::make('about')
                    ->columnSpanFull(),
                TextEntry::make('price')
                    ->money("IDR")
                    ->label("harga"),
                TextEntry::make('stock')
                    ->numeric(),
                TextEntry::make('category.name')
                    ->label('kategori'),
                TextEntry::make('brand.name')
                    ->label('merek'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (Produk $record): bool => $record->trashed()),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
