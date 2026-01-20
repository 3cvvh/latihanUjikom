<?php
namespace App\filament\resources\ProductTransactions\Actions;

use Filament\Actions\Action;

class cetakPdfAction{
public static function make():Action
{
return Action::make("cetak")
        ->label("cetak");
}
}
