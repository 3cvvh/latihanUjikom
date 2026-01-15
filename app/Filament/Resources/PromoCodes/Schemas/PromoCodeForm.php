<?php

namespace App\Filament\Resources\PromoCodes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PromoCodeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('code')
                    ->required(),
                TextInput::make('discountamount')
                    ->required()
                    ->label("harga")
                    ->currencyMask()
                    ->numeric()
                    ->prefix("Rp"),
            ]);
    }
}
