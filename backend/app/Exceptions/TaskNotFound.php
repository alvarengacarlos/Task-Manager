<?php

namespace App\Exceptions;

class TaskNotFound extends \Exception {

    public function __construct()
    {
        $this->message = __("exceptions.task_not_found");
    }

    public function report() {
        return false;
    }

    public function render() {
        return response()->json(["message" => $this->getMessage()], 404);
    }
}