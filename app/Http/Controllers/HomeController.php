<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Category;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{   
    
    public function index(Request $request){
        $data['AuthUser'] = Auth::user();       

        return view('home', $data);
    } 
    // public function index2(Request $request){
    //     $data['AuthUser'] = Auth::user();

    //     return view('home_op', $data);   
    
    // }
}
