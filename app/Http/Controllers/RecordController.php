<?php
namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use App\Models\Task;
use App\Models\Working_hour;
use App\Models\Record;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;

use Illuminate\Http\Request;

class RecordController extends Controller
{
    //
    public function index(Request $request){ 
        

    }

    public function create(Request $request){ 
        
        $record_task = Task::join('records', 'tasks.id', '=', 'records.task_id')->select('records.id as r_id', 'records.current_date','records.object','records.interested', 'records.quantity','records.task_id', 'records.total_points', 'records.user_id','tasks.id', 'tasks.description', 'tasks.point')->get();

        // $records = Record::whereDate('current_date', $filteredDate)->get();
        $records = Record::all(); 
        $tasks = Task::all();        
        $data['AuthUser'] = Auth::user();        
        $data['tasks'] = $tasks;
        $data['records'] = $records;
        $data['record_task'] = $record_task;               
        
        return view('record.create', $data);
    }

    public function create_action(Request $request)
    {         
        $validated = $request->validate([ 
            'current_date.*' => 'required',
            'user_id.*' => 'required',
            'object.*' => 'required',
            'interested.*' => 'required',
            'task_id.*' => 'required',
            'quantity.*' => 'required',   
            'total_points.*' => 'required',         
        ]);

        $registers = [];        
        
        //percorrendo o array de dados vindos do formulario 
       foreach($request->current_date as $key => $value){
           $registers[] = [
                'current_date' => $value,
                'user_id' => $request->user_id[$key],
                 'object' => $request->object[$key], 
                 'interested' => $request->interested[$key], 
                 'task_id' => $request->task_id[$key], 
                 'quantity' => $request->quantity[$key],
                 'total_points' => $request->total_points[$key],                  
            ];
        }           
            $dbRecord = Record::insert($registers);
            return redirect()->route('record.create')
            ->with('success', 'Atividade inserida!');       
    }         
    

    public function edit(Request $request){      
        $id = $request->id;

        $tasks = Task::all();        

        $records = Record::find($id);
        if(!$records){
            return redirect(route('home'));
        }        
        $data['tasks'] = $tasks;
        $data['records'] = $records;

        return view('record.edit', $data);
    }

    public function edit_action(Request $request ){
        
        $request_data = $request->only(['current_date', 'user_id', 'object', 'interested', 'task_id', 'quantity']);

        $records = Record::find($request->id);

        if(!$records){
            return 'Erro de atividade não existente';
        }
        $records->update($request_data);
        $records->save();
        return redirect(route('home'));

    }

    public function delete(Request $request){
        $id = $request->id;

        $records = Record::find($id);

        if($records){
            $records->delete();
        }
        return redirect(route('record.create'));
    }

    // public function datatask(Request $request){
    //     $tasks = Task::all();

    //     $data['tasks'] = $tasks;

    //     return view('record.datatask', $data);
    // }
}
    
