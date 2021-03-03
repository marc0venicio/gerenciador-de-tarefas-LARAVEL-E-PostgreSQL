<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Models\ModelTask as ModelsModelTask;
use App\Models\ModelTask;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Post;
use PhpParser\Node\Expr\PostDec;

class TaskController extends Controller
{

    private $objUser;
    private $objTask;

    public function __construct(){
        $this->objUser= new User();
        $this->objTask= new ModelsModelTask();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $task =ModelsModelTask::all();
        $users = User::all();
        return view('index', compact('task', 'users'));
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $task =ModelsModelTask::all();
        $users = User::all();
        return view('create', compact('users', 'task'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        $cad=ModelsModelTask::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'id_user'=>$request->id_user,
            'priori'=>$request->priori,
        ]);

        if($cad){
            return redirect('tasks');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pivo =ModelsModelTask::all();
        $task =ModelsModelTask::find($id);
        $users = User::all();
        return view('edit', compact('pivo','task', 'users'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, $id)
    {
        ModelsModelTask::where(['id'=>$id])->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'id_user'=>$request->id_user,
            'priori'=>$request->priori,
        ]);
        return redirect('tasks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del=ModelsModelTask::destroy($id);
        return($del)?"sim":"não";
    }
    
    /**
     * Method task_done
     *
     * @param $id $id [explicite description]
     *
     * @return void
     */
    public function task_done($id){
        $tasks = ModelsModelTask::find($id);
        $tasks->done = new \DateTime();
        $tasks->save();
        return redirect('tasks');
    }

    

    public function search(Request $request)
    {
        $task =ModelsModelTask::all();
        $users = User::all();
        $filters = $request->except('_token');
        $task =ModelsModelTask::all();
        $users = User::all();
        $posts = ModelsModelTask::where('id_user', '=', $request->search)
                        ->Where('title', '=', $request->search)
                        ->get();//dd($posts);
       
        return view('search', compact('posts', 'filters', 'users', 'task'));
    }
    

}
