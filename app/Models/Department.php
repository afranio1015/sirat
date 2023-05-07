<?php

namespace App\Models;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'acronym'        

    ];

    public function task(){
        return $this->hasMany(Task::class);//Um setor pode ter varias tarefas

    }
}
