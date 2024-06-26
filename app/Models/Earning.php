<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Earning extends Model
{
    use HasFactory;

    protected $table = 'earnings';
    protected $fillable = [
        'salary_id', 'holiday_allowance', 'allowance', 'bonus', 'overtime',
        'fixed_allowance', 'variable_allowance', 'bpjs_employment_allowance', 'bpjs_health_allowance', 'insurance_allowance', 'income_tax_allowance',
    ];

    public function salary()
    {
    	return $this->belongsTo(Salary::class);
    }
}
