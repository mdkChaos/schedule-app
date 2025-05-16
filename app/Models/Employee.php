<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'surname',
        'position_id'
    ];

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }

    public function cellHistory(): HasMany
    {
        return $this->hasMany(EmployeeCell::class);
    }

    public function brigadeHistory(): HasMany
    {
        return $this->hasMany(EmployeeBrigade::class);
    }

    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }

    public function currentCell(): HasOne
    {
        return $this->hasOne(EmployeeCell::class)
            ->whereNull('end_date')
            ->latest('start_date');
    }

    public function currentBrigade(): HasOne
    {
        return $this->hasOne(EmployeeBrigade::class)
            ->whereNull('end_date')
            ->latest('start_date');
    }
}
