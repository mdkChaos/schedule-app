<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Workshop extends Model
{
    use SoftDeletes, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'factory_id', // Додано зовнішній ключ
    ];

    /**
     * Get the factory that owns the workshop.
     */
    public function factory()
    {
        return $this->belongsTo(Factory::class);
    }

    /**
     * Get the departments for the workshop.
     */
    public function departments()
    {
        return $this->hasMany(Department::class);
    }
}
