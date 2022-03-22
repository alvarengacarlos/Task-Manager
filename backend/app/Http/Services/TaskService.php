<?php

namespace App\Http\Services;

use App\Models\Task;
use App\Exceptions\TaskNotFound;

class TaskService
{

    public function getAllTasks()
    {        
        return Task::all();
    }

    public function getTaskById(int $id)
    {        
        $task = $this->findTask($id);

        return $task;
    }

    public function createTask(string $title, string $body)
    {
        $task = new Task();
        $task->title = $title;
        $task->body = $body;

        $task->save();

        return $task;
    }

    public function updateTaskById(int $id, string $title, string $body)
    {        
        $task = $this->findTask($id);

        $task->title = $title;
        $task->body = $body;

        $task->save();

        return $task;
    }

    public function deleteTaskById(int $id)
    {
        $task = $this->findTask($id);

        $task->delete();

        return $task;
    }    

    private function findTask($id) 
    {        
        $task = Task::find($id);

        if (!$task) {
            throw new TaskNotFound();
        }

        return $task;
    }
}