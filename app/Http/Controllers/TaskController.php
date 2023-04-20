<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Task;
use App\Http\Requests\TaskPostRequest;
use App\Models\User;
use App\Models\Project;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\UserPostRequest;
use App\Http\Requests\UserPutRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\TaskPutRequest;


class TaskController extends Controller
{
    public function insert(Request $request, Project $project) {
        $users = User::all();
        if(isset($error)) {
            dd($error);
        }
        return view('task.insert', ['users'=>$users, 'project'=>$project]);
    }

    public function store(TaskPostRequest $request, Project $project) {
        $task = new Task();
        $task->fill($request->all());
        $task->project_id = $project->id;
        $task->save();
        $request->session()->flash('success', 'A tarefa foi criada com sucesso.');
        return redirect()->route('project.list');
    }

    public function list(Request $request, Project $project) {
        $tasks = $project->tasks;
        return view('task.list', ['tasks'=>$tasks]);
    }

    public function edit(Request $request, Task $task) {
        $users = User::all();
        return view('task.edit', ['users'=>$users, 'task'=>$task]);
    }

    public function update(TaskPutRequest $request, Task $task) {
        $validated = $request->validated();
        $task->fill($request->all());
        $task->update();
        $request->session()->flash('success', 'A tarefa foi editada com sucesso.');
        return redirect()->route('task.list', $task->project_id);
    }

    public function delete(Request $request, Task $task) {
        $task->delete();
        $request->session()->flash('success', 'A tarefa foi deletada com sucesso.');
        return redirect()->route('task.list', $task->project_id);
    }
}
