<?php
namespace App\filament\resources\ProductTransactions\Actions;

use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions\Action;
use Illuminate\Support\Facades\Response;


class cetakPdfAction{
public static function make():Action
{
return Action::make("cetak")
        ->label("cetak")
        ->icon("heroicon-o-document-text")
        ->url(fn($record) => route("cetak.print",$record->id))
        ->openUrlInNewTab();
}
}
