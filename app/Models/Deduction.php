<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deduction extends Model
{
    use HasFactory;

    protected $table = 'deductions';
    protected $fillable = [
        'salary_id', 'tax', 'bpjs', 'medical_aid', 'unpaid_leave'
    ];

    public function salary()
    {
    	return $this->belongsTo(Salary::class);
    }
}
