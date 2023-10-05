<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class change extends Model
{
    protected $table= 'changes';
    use HasFactory;
    protected $fillable = ['table_name', 'editor', 'changes', 'status', 'original', 'reviewer'];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'editor');
    }
}
