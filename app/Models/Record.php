<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Task;

class Record extends Model
{
    use HasFactory;
    protected $fillable = [
        'current_date',
        'user_id',
        'object',
        'interested',        
        'task_id',
        'quantity',
        'total_points'        
    ];

    public function task(){
        return $this->hasMany(Task::class);//Em um registro pode ter várias tarefas

    }
    public function user(){
        return $this->hasMany(User::class);//Em um registro pode ter vários usuarios

    }
    
}
