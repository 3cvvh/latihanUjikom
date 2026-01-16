<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
class ProductTransaction extends Model
{
    use SoftDeletes;
    protected $guarded = ["id"];
    public function produk():BelongsTo
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
    public function promoCode():BelongsTo
    {
        return $this->belongsTo(PromoCode::class, 'promo_code_id');
    }
    public static function generateUniqueTrxId(){
            $prefix = "TJH";
            do {
                $randomString = $prefix . mt_rand(10001,99999);
            } while (self::where("booking_trx_id",$randomString)->exist());
            return $randomString;
    }
}
