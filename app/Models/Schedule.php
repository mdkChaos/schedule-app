<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schedule extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'date',
        'shift_id',
        'user_id',
        'description',
    ];

    /**
     * Get the user that owns the schedule.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the shift that owns the schedule.
     */
    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }
}
