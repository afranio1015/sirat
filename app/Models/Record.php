<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;
    protected $fillable = [
        'working_hour_id',
        'object',
        'interested',        
        'task_id',
        'quantity'
    ];

    public function task(){
        return $this->hasMany(Task::class);//Em um registro pode ter várias tarefas

    }
    public function working_hour(){
        return $this->hasMany(Working_hour::class);//Em um registro pode ter vários expedientes

    }
}
