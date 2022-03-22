<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAndUpdateTaskRequest;
use App\Http\Services\TaskService;
use App\Http\Resources\TaskResource;

class TaskController extends Controller
{

    private TaskService $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function getAllTasks()
    {        
        $tasksCollection = $this->taskService->getAllTasks();
        
        return response(TaskResource::collection($tasksCollection), 200);        
    }

    public function getTaskById(int $id)
    {       
        $task = $this->taskService->getTaskById($id);
        
        return response(new TaskResource($task), 200);  
    }

    public function createTask(CreateAndUpdateTaskRequest $request)
    {
        $request->validated();

        $titleTask = $request->input("title");
        $bodyTask = $request->input("body");
       
        $task = $this->taskService->createTask($titleTask, $bodyTask);
        
        return response(new TaskResource($task), 201);       
    }

    public function updateTaskById(CreateAndUpdateTaskRequest $request, int $id)
    {
        $request->validated();

        $titleTask = $request->input("title");
        $bodyTask = $request->input("body");
        
        $task = $this->taskService->updateTaskById($id, $titleTask, $bodyTask);
        
        return response(new TaskResource($task), 200);
    }

    public function deleteTaskById(int $id)
    {        
        $task = $this->taskService->deleteTaskById($id);
        
        return response(new TaskResource($task), 200);        
    }
}
