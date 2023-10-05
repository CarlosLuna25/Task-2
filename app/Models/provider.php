<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class provider extends Model
{
    protected $table ='provider';
    use HasFactory;
    protected $fillable= ['name', 'address'];
    
    public function stores() : HasMany
    {
        return $this->hasMany(provider_store::class,'provider_id');
    }
    public function products() : HasMany
    {
        return $this->hasMany(product::class, 'provider_id');
    }
}
