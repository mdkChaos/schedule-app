<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cell extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
        'department_id',
    ];

    /**
     * Get the department that owns the cell.
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function employeeHistory(): HasMany
    {
        return $this->hasMany(EmployeeCell::class);
    }
}
