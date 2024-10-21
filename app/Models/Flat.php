<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flat extends Model
{
    use HasFactory;

    public function floor(): BelongsTo
    {
        return $this->belongsTo(Floor::class);
    }
}
