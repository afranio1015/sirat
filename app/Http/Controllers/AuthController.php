<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;


class AuthController extends Controller
{
    //    
    public function index(Request $request){  
              
        if(Auth::check()){
            return redirect()->route('home');
        }
        return view('login');       
    }

    public function login_action(Request $request){  
        // $data = array(
        //     'aviso'  => ''
        // );      

        $validator = $request->validate([
            'login' =>'required',
            'password' =>'required|min:6',            

        ]);  
        // $isAdmin = Gate::allows('isAdmin');  
    //    $type_user = $request->type_user; 

         if(Auth::attempt($validator)) {

            return redirect()->route('home'); 

         } //return view('login');
         
    }
        
    public function create(Request $request){
        $users = User::all();
        $data['users'] = $users;
        
        return view('user.create',$data);
    }
    public function create_action(Request $request){

        $request->validate([
            'name' => 'required|unique:users',
            'registration' => 'required|unique:users',
            'login' => 'required|unique:users',
            'type_user' => 'required',
            'password' =>'required|min:6|confirmed',

        ]);
        $data = $request->only('name', 'registration', 'login', 'type_user', 'password');
        $data['password'] = Hash::make($data['password']);
        
        User::create($data);

        return redirect(route('home'));
    }
    public function edit(Request $request){
        $id = $request->id;

        $user = User::find($id);
        if(!$user){
            return redirect(route('user.create'));
        }

        $data['user'] = $user;

        return view('user.edit', $data);       
    }
    public function edit_action(Request $request){

        $request->validate([
            'name' => 'required',
            'registration' => 'required',
            'login' => 'required',
            'type_user' => 'required',
            'password' =>'required|min:6|confirmed',

        ]);

        $request_data = $request->only(['name', 'registration', 'login', 'type_user', 'password' ]);

        $request_data['password'] = Hash::make($request_data['password']);

        $user = User::find($request->id);

        if(!$user){
            return 'Erro de atividade não existente';
        }
        $user->update($request_data);
        $user->save();
        return redirect(route('home'));
    }

    public function delete(Request $request){
        $id = $request->id;

        $user = User::find($id);

        if($user){
            $user->delete();
        }
        return redirect(route('home'));
    }
    public function logout(){       
        
        Auth::logout();
        return redirect(route('login'));
      }
}
