@extends("layouts.app")

@section('content')
<div class="card mx-auto">
    <div class="card-body">
        <div class="card-title">
            <h2><a class ="btn btn-primary" href="{{ route('project.list') }}"><i class="fa-solid fa-left-long"></i></a> Editar Projeto</h2>
        </div>
        <div class="card-text">
            <form method="POST" action="{{ route('project.update', $project->id) }}">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <label for="name">Nome</label>
                        <input class="form-control form-control-lg" value="{{ $project->name }}" type="text" id="name" name="name"/>
                    </div>
                    <div class="col-md-4">
                        <label for="status">Status</label>
                        <select class="form-select form-select-lg" name="status" id="status">
                            <option {{ ($project->status == true ? 'selected' : "") }} value="true">Ativo</option>
                            <option {{ ($project->status == false ? 'selected' : "") }} value="false">Inativo</option>
                        </select>
                    </div>
                </div>
                <div>
                    <div class="col-md-3">
                        <label for="user_id">Responsável</label>
                        <select class="form-select form-select-lg" name="user_id" id="user_id">
                            <option value="">Selecione</option>
                            @foreach($users as $user)
                            <option {{ ($project->user_id == $user->id ? 'selected' : "") }} value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="observation" class="form-label">Observação</label>
                        <textarea class="form-control form-control-lg"  name="observation" id="observation" cols="15" rows="2">{{ $project->observation }}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="start_date">Início</label>
                        <input class ="form-control form-control-lg"type="date" value="{{ $project->start_date->format('Y-m-d') }}" id="start_date" name="start_date"/>
                    </div>
                
                    <div class="col-md-4">
                        <label for="end_date">Fim</label>
                        <input class="form-control form-control-lg" type="date" value="{{ $project->end_date->format('Y-m-d') }}" id="end_date" name="end_date"/>
                    </div>
                </div>
                <div class="pt-3">
                    <button class="btn btn-success btn-lg" type="submit">Salvar</button>
                </div>
                @method('put')
            </form>
        </div>
    </div>
</div>


@endsection
