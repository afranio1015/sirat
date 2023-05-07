<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    //
    public function index(){

    }
    public function create(Request $request){
        $list = Department::all();
        return view('department.create',[
            'list' => $list
        ]);
    }

    public function create_action(Request $request){
        $dpto = $request->only(['name', 'acronym']);

        $dbdpto = Department::create($dpto);
        return redirect(route('home'));

    }
    public function edit(Request $request){
        $id = $request->id;

        $dpto = Department::find($id);
        if(!$dpto){
            return redirect(route('home'));
        }
        $data['dpto'] = $dpto;

        return view('department.edit', $data);
    }

    public function edit_action(Request $request ){
        $request_data = $request->only(['name', 'acronym']);

        $dpto = Department::find($request->id);

        if(!$dpto){
            return 'Erro de Unidade não existente';
        }
        $dpto->update($request_data);
        $dpto->save();
        return redirect(route('home'));

    }

    public function delete(Request $request){
        $id = $request->id;

        $dpto = Department::find($id);

        if($dpto){
            $dpto->delete();
        }
        return redirect(route('home'));
    }
}
