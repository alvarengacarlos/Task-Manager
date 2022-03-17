<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAndUpdateTaskRequest;


class TaskController extends Controller
{

    public function getAllTasks()
    {        
        return response()->json([
            1 => "Task 1",
            2 => "Task 2",
            3 => "Task 3",
        ], 200);
    }

    public function getTaskById($id)
    {   
        return response()->json(["id" => $id], 200);
    }

    public function createTask(CreateAndUpdateTaskRequest $request)
    {   
        $request->validated();

        $titleTask = $request->input("title");
        $bodyTask = $request->input("body");

        return response()->json([
            "id" => 1,
            "title" => $titleTask,
            "body" => $bodyTask
        ], 201);
    }

    public function updateTaskById(CreateAndUpdateTaskRequest $request, $id)
    {
        $request->validated();

        $titleTask = $request->input("title");
        $bodyTask = $request->input("body");

        return response()->json(["id" => $id, "title" => $titleTask, "body" => $bodyTask], 201);
    }

    public function deleteTaskById($id)
    {
        return response()->json(["id" => $id], 200);
    }
}