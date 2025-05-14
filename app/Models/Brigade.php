<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brigade extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
    ];

    public function employeeHistory(): HasMany
    {
        return $this->hasMany(EmployeeBrigade::class);
    }
}
