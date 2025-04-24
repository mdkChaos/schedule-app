<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brigade extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
        'cell_id',
    ];

    /**
     * Get the cell that owns the brigade.
     */
    public function cell()
    {
        return $this->belongsTo(Cell::class);
    }

    /**
     * Get the users for the brigade.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
