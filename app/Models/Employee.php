<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';
    protected $fillable = [
        'position_id', 'part_id', 'user_id', 'status', 'code', 'name', 'place_of_birth', 'date_of_birth', 'id_card_number', 'tax_number', 'email',
        'address', 'phone', 'religion', 'education', 'bank', 'account_number',
        'start_contract', 'end_of_contract', 'basic_salary', 'marital_status', 'dependents_count', 'signature_file', 'id_card_file'
    ];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function part()
    {
        return $this->belongsTo(Part::class);
    }

    public function wfhtransactions()
    {
        return $this->hasMany(WfhTransaction::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendances::class);
    }

    public function leavequotas()
    {
        return $this->hasMany(LeaveQuota::class);
    }

    public function salaraies(){
    	return $this->hasMany(Salary::class);
    }
}
