<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';
    protected $fillable = [
        'employee_id', 'leave_date', 'return_date', 'description', 'for',
        'sub_permission', 'reason', 'status', 'ba_signature',
        'manager_signature', 'applicant_signature', 'attachment', 'total_day'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function scopeCountData($query, $start, $end, $value1, $value2)
    {
        return $query->whereBetween('created_at', [$start, $end])
                    ->whereYear('created_at', '=', date('Y'))
                    ->whereFor($value1)
                    ->whereStatus($value2)
                    ->count();
    }
}
