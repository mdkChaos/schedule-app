<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
        'employee_code',
        'name',
        'surname',
        'email',
        'role_id',
    ];

    /**
     * Get the role associated with the user.
     *
     * @return BelongsTo
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Get the schedules associated with the user.
     *
     * @return HasMany
     */
    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }

    /**
     * Get the brigade assignments associated with the user.
     *
     * @return HasMany
     */
    public function brigadeAssignments()
    {
        return $this->hasMany(BrigadeUser::class);
    }

    /**
     * Get the current brigade associated with the user.
     *
     * @return HasMany
     */
    public function currentBrigade()
    {
        return $this->hasOne(BrigadeUser::class)->whereNull('end_date');
    }
}
