<?php

namespace App\Filament\Resources\ProductTransactions\Pages;

use App\Models\Produk;
use App\Models\PromoCode;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Validation\ValidationException;
use App\Filament\Resources\ProductTransactions\ProductTransactionResource;

class CreateProductTransaction extends CreateRecord
{
    protected static string $resource = ProductTransactionResource::class;
        protected function mutateFormDataBeforeCreate(array $data):array
    {
    //ambil datas
    $produk = Produk::find($data["id_produk"]);
    //jumlah kan total
    $harga = $produk->price * $data["quantity"];
    //jika produk stock nya kosong atau kurang
    if($produk->stock < $data["quantity"]){
            throw ValidationException::withMessages([ 'quantity' => 'Jumlah melebihi stok tersedia.', ]);
            Notification::make()->danger();
        }
    //jika ada diskon
    if(!empty($data["promo_code_id"])){
        $promo = PromoCode::find($data["promo_code_id"]);
        $grandTotal =  $harga - $promo->discountamount;
        }

        $data["booking_trx_id"] = "aqil-". mt_rand(1,1000);
        //kurangi stock sesuai yang dipesan
        $produk->stock -= $data["quantity"];
        $produk->save();
        $data["grand_total_amount"] =  isset($grandTotal) ? $grandTotal : $harga;
        $data["subTotal_amount"] = $harga;
        return $data;
    }
}
