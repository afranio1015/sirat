<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Category;
use App\Models\Task;

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
        return redirect(route('home'));
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
        return redirect(route('home'));
    }
}
