<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'point',
        'category_id',
        'department_id'

    ];

    public function category(){
        return $this->belongsTo(Category::class);//Varias tarefas têm uma única categoria

    }
    public function department(){
        return $this->belongsTo(Department::class);//Varias tarefas para um único setor

    }
    public function record(){
        return $this->belongsTo(Record::class);//Um registro pertence a vários usuários 

    }
}
