<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shift extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * Get the schedules for the shift.
     */
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
