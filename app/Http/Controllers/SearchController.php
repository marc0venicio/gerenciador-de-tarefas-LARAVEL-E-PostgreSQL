<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function task_search(TaskRequest $request){
        dd($request->all());
        echo $request;
    }
}
