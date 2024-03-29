<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Category;
use App\Models\Task;
use App\Models\Record;

class TaskController extends Controller
{
    //
    public function index(){

    }

    public function create(Request $request){
        $categories = Category::all();
        $departments = Department::all();
        $tasks = Task::all();

        $data['categories'] = $categories;
        $data['departments'] = $departments;
        $data['tasks'] = $tasks;

        return view('task.create', $data);
    }
    public function create_action(Request $request){
        $task = $request->only(['description', 'point', 'category_id', 'department_id']);
        
        $dbTask = Task::create($task);
        return redirect(route('task.create'));
    }

    public function edit(Request $request){      
        $id = $request->id;

        $categories = Category::all();
        $departments = Department::all();        

        $task = Task::find($id);
        if(!$task){
            return redirect(route('home'));
        }
        $data['task'] = $task;
        $data['categories'] = $categories;
        $data['departments'] = $departments;

        return view('task.edit', $data);
    }

    public function edit_action(Request $request ){
        
        $request_data = $request->only(['description', 'point', 'category_id','department_id']);

        $task = Task::find($request->id);

        if(!$task){
            return 'Erro de atividade não existente';
        }
        
        $task->update($request_data);
        $task->save();
        return redirect(route('home'));

    }

    public function delete(Request $request){
        $id = $request->id;

        $task = Task::find($id);

        if($task){
            $task->delete();
        }
        return redirect(route('record.create'));
    }

    public function obterPontosDaTarefa($tarefa_id, Request $request){ 
        $quantidade = $request->quantity;       
        
        $tarefa = Task::find($tarefa_id);
        $quantidade = Record::find($quantidade);        

        if(!$tarefa){              
            return response()->json(['error' => 'Tarefa não Encontrada'], 404);          
        }
        $quantidade = $request->input('quantidade');
        $pontos = $tarefa->point;

        //Realizar o cálculo do total de pontos
        $totalPontos = $quantidade * $pontos;
        
        return response()->json(['totalPontos'=>$totalPontos]);        
        
    }
}
