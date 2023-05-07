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

    public function create(Request $request)
    {
        $record_task_workingHour = Task::join('records', 'tasks.id', '=', 'records.task_id')
                                        ->join('working_hours', 'records.working_hour_id', '=', 'working_hours.id')
                                        ->select('records.id', 'records.object','records.interested', 'records.quantity',
                                                'tasks.id as task_id', 'tasks.description', 'tasks.point',
                                                'working_hours.id as wh_id', 'working_hours.currentDate', 'working_hours.user_id')->get();
        // $records = Record::all();
        $working_hours = Working_hour::all();
        $tasks = Task::all();
        $data['AuthUser'] = Auth::user();
        $data['working_hours'] = $working_hours;
        $data['tasks'] = $tasks;
        // $data['records'] = $records;
        $data['record_task_workingHour'] = $record_task_workingHour;     


        return view('record.create', $data);
    }

    public function create_action(Request $request)
    { 
        $validated = $request->validate([ 
            'working_hour_id.*' => 'required',
            'object.*' => 'required',
            'interested.*' => 'required',
            'task_id.*' => 'required',
            'quantity.*' => 'required',
        ]);

        $registers = [];
        
        
        //percorrendo o array de dados vindos do formulario 
       foreach($request->working_hour_id as $key => $value){
           $registers[] = [
                'working_hour_id' => $value,
                 'object' => $request->object[$key], 
                 'interested' => $request->interested[$key], 
                 'task_id' => $request->task_id[$key], 
                 'quantity' => $request->quantity[$key]
            ];
        }   
        
            $dbRecord = Record::insert($registers);
            return redirect()->route('record.create');       
    }         
    

    public function edit(Request $request){      
        $id = $request->id;

        $working_hours = Working_hour::all();
        $tasks = Task::all();        

        $records = Record::find($id);
        if(!$records){
            return redirect(route('home'));
        }
        $data['working_hours'] = $working_hours;
        $data['tasks'] = $tasks;
        $data['records'] = $records;

        return view('record.edit', $data);
    }

    public function edit_action(Request $request ){
        
        $request_data = $request->only(['working_hour_id', 'object', 'interested', 'task_id', 'quantity']);

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
        return redirect(route('home'));
    }
}
    
