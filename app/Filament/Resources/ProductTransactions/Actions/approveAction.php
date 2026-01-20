<?php
namespace App\Filament\Resources\ProductTransactions\Actions;

use Filament\Actions\Action;
use Filament\Notifications\Notification;

class ApproveAction{
    public static function make():Action
    { // me return action btn
        return Action::make("approve")
                //membuat label dari btn
                ->label("approve")
                //membuat btn menjadi hijau
                ->color("success")
                //membuat lingkaran di sebelah btn
                ->icon('heroicon-o-check-circle')
                //akan memunculkan popup sebagai verifikasi akan di ubah status pembayarn nya
                ->requiresConfirmation()
                ->modalHeading("kamu yakin akan menganti status data ini? ")
                ->modalDescription("akan menganti status pembayaran menjadi selesai")
                ->modalSubmitActionLabel("iya")
                //jika user mensubmit iya maka akan terjalankan function anonim yang menganti data is_paid menjadi true
                ->action(function($record){
                    $record->is_paid = true;
                    $record->save();
                     //membuat alert bahwa data berhasil di update
                    Notification::make()
                    ->title("transaksi berhasil di approve")
                    ->success()
                    ->send();

                })
                //fungsi nya agar tombol approve hanya muncul di data yang status nya false(belum bayar)
                ->visible(fn($record) => $record->is_paid == false);
    }
}
