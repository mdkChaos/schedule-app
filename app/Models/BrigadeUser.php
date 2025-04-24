<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BrigadeUser extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'user_id',
        'brigade_id',
        'start_date',
        'end_date',
    ];

    /**
     * Get the user that owns the brigade user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the brigade that owns the brigade user.
     */
    public function brigade()
    {
        return $this->belongsTo(Brigade::class);
    }
}
