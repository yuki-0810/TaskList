<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Tasks;    // 追加

class TaskListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $taskposts = $user->taskposts()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'taskposts' => $taskposts,
            ];
        }

        return view('TaskList.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*
        //
        $task = new Tasks;

        return view('TaskList.create', [
            'task' => $task,
        ]);
        */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*   
        $this->validate($request, [
            'status' => 'required|max:10',   // 追加
            'content' => 'required|max:255',
        ]);
        
        //
        $task = new Tasks;
        $task->content = $request->content;
        $task->status = $request->status;
        $task->save();

        return redirect('/');
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*
        //
        $task = Tasks::find($id);

        return view('TaskList.show', [
            'task' => $task,
        ]);
        */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /*
        //
        $task = Tasks::find($id);

        return view('TaskList.edit', [
            'task' => $task,
        ]);
        */
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /*
        $this->validate($request, [
            'status' => 'required|max:10',   // 追加
            'content' => 'required|max:255',
        ]);

        //
        $task = Tasks::find($id);
        $task->content = $request->content;
        $task->status = $request->status;
        $task->save();

        return redirect('/');
        */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*
        //
        $task = Tasks::find($id);
        $task->delete();

        return redirect('/');
        */
    }
}
