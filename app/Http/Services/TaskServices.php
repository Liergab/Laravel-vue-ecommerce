<?php

namespace App\Http\Services;

use Illuminate\Http\Request;

interface TaskServices
{
    public function getTask();
    public function showTask($task);
    public function store($request);
    public function update($request, $task);
    public function destroy($task);
}