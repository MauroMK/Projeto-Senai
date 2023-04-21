<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\ProjectPostRequest;
use App\Models\User;

class ProjectController extends Controller
{
    public function insert() {
        $users = User::all();
        if(isset($error)) {
            dd($error);
        }
        return view('project.insert', ['users'=>$users]);
    }

    public function store(ProjectPostRequest $request) {
        $project = new Project();
        $project->fill($request->all());
        $project->user_id = auth()->user()->id;  // Pega o id do usuário logado
        $project->save();
        $request->session()->flash('success', 'Tarefa ' . $project->id . ' foi criada com sucesso.');
        return redirect()->route('project.list');
    }

    public function list(Request $request) {
        $perPage = 10;
        $userId = auth()->user()->id;           // Armazena o id do usuário logado
        $projects = Project::where('situacao', true)->with("user")->orderBy('id', 'DESC')->simplePaginate($perPage);
        return view('project.list', ['projects'=>$projects, 'userID'=>$userId]);
    }

    public function edit(Request $request, Project $project) {
        $users = User::all();
        return view('project.edit', ['users'=>$users, 'project'=>$project]);
    }

    public function update(ProjectPostRequest $request, Project $project) {
        $validated = $request->validated();
        $project->fill($request->all());
        $project->data_alteracao = now();
        $project->responsavel_alteracao = auth()->user()->name;
        $project->observacao = $request->observacao;
        $project->user_id = auth()->user()->id;
        $project->update();
        $request->session()->flash('success', 'A tarefa foi editada com sucesso.');
        return redirect()->route('project.list');
    }

    public function assignToMe(Request $request, Project $project) {
        $project->user_id = auth()->user()->id;
        $project->save();
        $request->session()->flash('success', 'A tarefa foi atribuída a você.');
        return back();
    }

    public function finishForm(Project $project)
    {
        return view('project.finish', compact('project'));
    }

    public function finish(ProjectPostRequest $request, Project $project) {
        $validated = $request->validated();
        $project->situacao = false;
        $project->descricao = $validated['descricao'];
        $project->save();
        $request->session()->flash('success', 'A tarefa foi finalizada com sucesso.');
        return redirect()->route('project.list');
    }

    public function delete(Request $request, Project $project) {
        $project->delete();
        $request->session()->flash('success', 'A tarefa foi excluída com sucesso.');
        return redirect()->route('project.list');
    }

}
