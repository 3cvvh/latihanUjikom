<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use illuminate\Support\Str;

class Produk extends Model
{
    use SoftDeletes;
    protected $guarded = ["id"];
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function brand():BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    public function transaction():HasMany
    {
        return $this->hasMany(Produk::class, 'id_produk');
    }
    public function sizes():HasMany
    {
        return $this->hasMany(ProdukSize::class, 'id_produk');
    }
    public function photos():HasMany
    {
        return $this->hasMany(ProdukPhoto::class, 'id_produk');
    }


}
