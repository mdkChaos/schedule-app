<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
        'workshop_id',
    ];

    /**
     * Get the workshop that owns the department.
     */
    public function workshop(): BelongsTo
    {
        return $this->belongsTo(Workshop::class);
    }

    /**
     * Get the cells for the department.
     */
    public function cells(): HasMany
    {
        return $this->hasMany(Cell::class);
    }
}
