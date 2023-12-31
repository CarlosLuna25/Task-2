<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class product_price extends Model
{
    protected $table ='product_price';
    use HasFactory;
    protected $fillable= ['product_id', 'store_id', 'price', 'edit', 'editor'];

    public function product() : BelongsTo
    {
        return $this->belongsTo(product::class, 'product_id' );
    }

    public function store(): BelongsTo
    {
        return $this->belongsTo(provider_store::class, 'store_id');
    }

}
