<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class warehouse extends Model
{
   protected $table = 'warehouses';
   use HasFactory;
   protected $fillable = ['name', 'address'];

   public function inventory() :HasMany
   {
      return $this->hasMany(inventory::class);
   }
}
