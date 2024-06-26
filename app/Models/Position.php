<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'part_id',
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
    public function part()
    {
        return $this->belongsTo(Part::class);
    }
}
