<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Factory extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * Get the workshops for the factory.
     */
    public function workshops(): HasMany
    {
        return $this->hasMany(Workshop::class);
    }
}
