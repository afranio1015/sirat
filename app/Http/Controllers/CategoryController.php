<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    public function index(){

    }
    public function create(Request $request){
        $list = Category::all();
        return view('category.create',[
            'list' => $list
        ]);
    }

    public function create_action(Request $request){

              $request->validate([
                'description' => 'required|unique:categories|min:4'
            ]);

        $cat = $request->only(['description']);
        $dbcat = Category::create($cat);        

        return view('category.create');       

    }
    public function edit(Request $request){             
        $id = $request->id;

        $cat = Category::find($id);
        if(!$cat){
            return redirect(route('home'));
        }
        $data['cat'] = $cat;

        return view('category.edit', $data);
    }

    public function edit_action(Request $request ){
        
        $request_data = $request->only(['description']);

        $cat = Category::find($request->id);

        if(!$cat){
            return 'Erro de categoria não existente';
        }
        $cat->update($request_data);
        $cat->save();
        return redirect(route('home'));

    }

    public function delete(Request $request){
        $id = $request->id;

        $cat = Category::find($id);

        if($cat){
            $cat->delete();
        }
        return redirect(route('home'));
    }

}
