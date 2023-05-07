<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Working_hour;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


class WorkingHourController extends Controller
{
    //
    public function index(){

    }

    public function create(Request $request){        

        $user_workingHour = User::join('working_hours', 'users.id', '=', 'working_hours.user_id')
                                ->select('users.id as u_id', 'users.name','users.login', 
                                        'working_hours.id', 'working_hours.currentDate', 
                                        'working_hours.event', 'working_hours.user_id' )
                                ->get();

        $users = User::all();
        
        // $currentDate = $user_workingHour->currentDate;
        // $currentDate = Carbon::parse($currentDate);
        // $currentDate_f = $currentDate->format('d/m/Y H:i:s');
        // $data['AuthUser'] = Auth::user();
        $data['user_workingHour'] = $user_workingHour;
        $data['users'] = $users;

       
        // return view('working_hour.create', ['user_workingHour' => $user_workingHour]);
        return view('working_hour.create', $data);
            
    }
    public function create_action(Request $request){
        $working_hour = $request->only(['currentDate', 'user_id', 'event']);        
        
        $dbworking_hour = Working_hour::create($working_hour);
        return redirect(route('home'));
    }

    // public function edit(Request $request){      
    //     $id = $request->id;

    //     $user = User::all();       

    //     $working_hours = Working_hour::find($id);
    //     if(!$working_hours){
    //         return redirect(route('home'));
    //     }
    //     $data['users'] = $users;
    //     $data['working_hours'] = $working_hours;        

    //     return view('working_hour.edit', $data);
    // }

    public function edit_action(Request $request ){
        
        $request_data = $request->only(['currentDate', 'user_id', 'event']);

        $working_hours = Working_hour::find($request->id);

        if(!$working_hours){
            return 'Erro de atividade não existente';
        }
        $working_hours->update($request_data);
        $working_hours->save();
        return redirect(route('home'));

    }

    public function delete(Request $request){
        $id = $request->id;

        $working_hours = Working_hour::find($id);

        if($working_hours){
            $working_hours->delete();
        }
        return redirect(route('home'));
    }
}
