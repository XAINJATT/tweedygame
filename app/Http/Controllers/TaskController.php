<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $request->validate([
            'index'   =>   'required|numeric|gt:0',
        ]);


        $creative_image_task = [];
        $mcqs_array = [];
        $qr_array = [];
        if (!empty($request->task_heading)) {
            foreach ($request->task_heading as $k => $v) {
                $creative_image_task[$k] = [
                    'task_heading' => $request->task_heading[$k],
                    'task_details' => $request->task_details[$k],
                ];
            }
        }

        
        $answers = [];
        if (!empty($request->question)) {
            foreach ($request->question as $k => $v) {
                echo $k;
                foreach ($request->answer[$k] as $t => $h) {
                    
                    $answers[$t] = [
                        'answer' => $request->answer[$k][$t],
                        'true' => $request->right__answer[$k][$t],
                    ];
                }
                $mcqs_array[$k] = [
                    'question' => $request->question[$k],
                    'answers' => $answers
                ];
            }
        }
        print_r($mcqs_array);

        if (!empty($request->qr_text)) {
            foreach ($request->qr_text as $e => $qr) {
                $qr_array[$e] = [
                    'qr_text' => $request->question[$e]
                ];
            }
        }

        $task_data = [
            'creative_image' => $creative_image_task,
            'mcqs' => $mcqs_array,
            'qr_text' => $qr_array
        ];
        $q = new Task();
        $q->game_id = $request->game_id;
        $q->task_desc = json_encode($task_data);
        if($q->save()){
            return response()->json(['status'=>'success','message'=>'Task Created Successfully']);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}
