<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class inventory extends Model
{
    protected $table= 'inventory';
    use HasFactory;
    protected $fillable = ['product_id', 'warehouses_id', 'stock'];

    public function product() : BelongsTo
    {
        return $this->belongsTo(product::class, 'product_id');
    }
    public function warehouse() : BelongsTo
    {
        return $this->belongsTo(warehouse::class, 'warehouses_id' );
    }
}
