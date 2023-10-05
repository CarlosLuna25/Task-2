<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class product extends Model
{
    protected $table ='product';
    use HasFactory;
    protected $fillable= ['provider_id', 'store_id','group_id','title', 'description','sku','edit','editor_id'];


    public function group() : BelongsTo
    {
        return $this->belongsTo(product_group::class , 'group_id');
    }
    public function provider(): BelongsTo
    {
        return $this->belongsTo(provider::class , 'provider_id');
    }
    public function store(): BelongsTo
    {
        return $this->belongsTo(provider_store::class, 'store_id');
    }
    public function prices() : HasMany
    {
        return $this->hasMany(product_price::class, 'product_id');
    }

}
