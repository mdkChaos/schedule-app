<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Workshop extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
        'factory_id',
    ];

    /**
     * Get the factory that owns the workshop.
     */
    public function factory(): BelongsTo
    {
        return $this->belongsTo(Factory::class);
    }

    /**
     * Get the departments for the workshop.
     */
    public function departments(): HasMany
    {
        return $this->hasMany(Department::class);
    }
}
