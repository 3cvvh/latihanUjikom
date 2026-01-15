<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PromoCode extends Model
{
    use SoftDeletes;
    protected $guarded = ["id"];
    public function transaksi():BelongsTo
    {
        return $this->belongsTo(ProductTransaction::class, 'promo_code_id');
    }
}
