<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TaskpostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'content' => 'required|max:255',
            'status' => 'required|max:10',
        ]);
        
        $request->user()->taskposts()->create([
            'content' => $request->content,
            'status' => $request->status,
        ]);
    
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        //
        $taskpost = \App\Taskpost::find($id);

        if (\Auth::user()->id === $taskpost->user_id) {
            return view('TaskList.edit', [
                'taskpost' => $taskpost,
             ]);
        }
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
        //
        $this->validate($request, [
            'status' => 'required|max:10',   // 追加
            'content' => 'required|max:255',
        ]);

        //
        $taskpost = \App\Taskpost::find($id);
        $taskpost->content = $request->content;
        $taskpost->status = $request->status;
        $taskpost->save();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $taskpost = \App\Taskpost::find($id);

        if (\Auth::user()->id === $taskpost->user_id) {
            $taskpost->delete();
        }

        return redirect()->back();
    }
}
