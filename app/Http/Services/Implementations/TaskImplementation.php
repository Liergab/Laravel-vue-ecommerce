<?php
namespace  App\Http\Services\Implementations;

use App\Http\Resources\TaskResource;
use App\Http\Services\TaskServices;
use App\Models\Task;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class TaskImplementation implements TaskServices
{
   use AuthorizesRequests;

   public function getTask()
   {
        $user = auth()->user();
        $task = Task::where('user_id', $user->id)
                    ->paginate(5);

        return response()->json([
            TaskResource::collection($task)
        ],200);
   }

   public function showTask($task)
   {
        return  response()->json([
            TaskResource::make($task)
        ],200);
   }

   public function store($request)
   {
        $validate = $request->validated();
        $task = auth()->user()
                      ->tasks()
                      ->create($validate);
        
        return response()->json([
            'success' => true,
            'message' => 'Task created successfully!',
            'data' => TaskResource::make($task)
        ], 201);
   }

   public function update($request, $task)
   {
        try {
            $this->authorize('update', $task);
        } catch (AuthorizationException $e) {
            return response()->json([
                'error' => 'Unauthorized',
                'message' => 'You do not have permission to update this task.'
            ], 403);
        }
        $task->update($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Task Updated!',
            'date'    => TaskResource::make($task)
        ],200);
   }

   public function destroy($task)
   {
        try {
            $this->authorize('delete', $task);
        } catch (AuthorizationException $e) {
            return response()->json([
                'error' => 'Unauthorized',
                'message' => 'You do not have permission to delete this task.'
            ], 403);
        }

        $task->delete();
        return response()->json([
            'message' => 'Task Deleted!'
        ],200);
   }
}