<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClickUp extends Model
{
    use HasFactory;

    protected $table = 'clickups';
    protected $fillable = [
        'wfhtransaction_id',
        'clickup',
    ];

    public function wfhtransactions()
    {
        return $this->hasMany(WfhTransaction::class);
    }
}
