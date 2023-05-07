<?php

namespace App\Models;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',        

    ];

    public function task(){
        return $this->HasMany(Task::class);//Uma caterigoria tem várias tarefas

    }
}
