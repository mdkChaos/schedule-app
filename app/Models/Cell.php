<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Get the users for the cell.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
