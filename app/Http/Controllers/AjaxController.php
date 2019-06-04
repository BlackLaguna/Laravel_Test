<?php

namespace App\Http\Controllers;

use App\Coment;
use App\Employee;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{
    public function save_employee(Request $request)
    {
        if( !$request -> ajax() ) return redirect('index');
        $employee = Employee::all()->find($request->id);
        $employee->name = $request->input('name');
        $employee->surname = $request->input('surname');
        $employee->post = Post::all()->where('name','=',$request->input('post'))->first()->id;
        $employee->save();
    }

    public function add_employee(Request $request)
    {
        if( !$request -> ajax() ) return redirect('index');
        $employee = new Employee;
        $employee->name = $request->name;
        $employee->surname = $request->surname;
        $employee->post = $request->post;
        $employee->company_id = Auth::user()->id;
        $employee->save();
    }

    public function delete_employee(Request $request)
    {
        if( !$request -> ajax() ) return redirect('index');
        $employee = Employee::all()->find($request->id)->delete();
    }

    public function add_coment(Request $request)
    {
        if( !$request -> ajax() ) return redirect('index');
        $coment = new Coment;
        $coment->body = $request->body;
        $coment->owner = Auth::user()->name;
        $coment->company_id = $request->id;
        $coment->save();
        $arr=[];
        $arr['name'] = $coment->owner;
        $arr['time'] = $coment->created_at;
        $arr['body'] = $coment->body;
        return $arr;
    }
}
