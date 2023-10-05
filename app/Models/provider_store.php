<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class provider_store extends Model
{
    protected $table ='provider_store';
    use HasFactory;
    protected $fillable= ['provider_id', 'name'];

        public function provider () : BelongsTo
        {
            return $this->belongsTo(provider::class, 'provider_id');
        }
        public function products() : HasMany
        {
            return $this->hasMany(product::class, 'store_id');
        }


}
