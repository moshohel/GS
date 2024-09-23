<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Floor;

class Building extends Model
{
    use HasFactory;

    /**
     * Get all of the floors for the Building
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function floors(): HasMany
    {
        return $this->hasMany(Floor::class);
    }

}
