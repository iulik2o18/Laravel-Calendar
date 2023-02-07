<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Builder\Class_;

class Appointment extends Model
{
    protected $fillable = [
        'start_time',
        'finish_time',
        'comments',
        'client_name',
        'employee_id'
    ];

    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}
