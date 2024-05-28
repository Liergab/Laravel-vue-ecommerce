<?php

namespace App\Http\Controllers\Api;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Services\TaskServices;

class TaskController extends Controller
{

    public function __construct(public TaskServices $taskServices)
    {
    }
    
    public function index()
    {
       return $this->taskServices->getTask();  
    }

    public function store(StoreTaskRequest $request)
    {
        return $this->taskServices->store($request);
    }

    public function show(Task $task)
    {
        return $this->taskServices->showTask($task);
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        return $this->taskServices->update($request, $task);
    }

    public function destroy(Task $task)
    {
        return $this->taskServices->destroy($task);
    }
}
