<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class Todo extends Controller
{
    //
    public function index()
    {
        $tasks = DB::table('todos')->orderBy('id', 'desc')->get();
        $data = json_encode($tasks);

        return view('welcome')->with([
            'data'=>$data]);
    }

    public function addTask(Request $request)
    {
        $todo = new \App\Todo();
        $todo->task_text = $request->post('taskText');
        $todo->save();
    }
}
