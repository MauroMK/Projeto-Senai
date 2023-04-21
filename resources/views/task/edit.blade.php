@extends("layouts.app")

@section('content')
<div class="card mx-auto">
    <div class="card-body">
        <div class="card-title">
            <h2><button class ="btn btn-primary" onclick="history.back()"><i class="fa-solid fa-left-long"></i></button> Editar Tarefa</h2>
        </div>
        <div class="card-text">
            <form method="POST" action="{{ route('task.update', $task->id) }}" class="row needs-validation" novalidate>
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="name">Nome</label>
                        <input class="form-control form-control-lg" type="text" id="name" name="name" value="{{ $task->name }}" />
                    </div>
                    <div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="descricao" class="form-label">Descrição</label>
                            <textarea class="form-control form-control-lg" name="descricao" id="descricao" cols="15" rows="2">{{ $task->descricao }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="status">Status</label>
                        <select class="form-select form-select-lg" name="status" id="status" >
                            <option value="true">Ativo</option>
                            <option value="false">Inativo</option>
                        </select>
                    </div>
                </div>
                <div>
                    <div class="col-md-3">
                        <label for="user_id">Responsável</label>
                        <select class="form-select form-select-lg" name="user_id" id="user_id" >
                            @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="start_date">Início</label>
                        <input class ="form-control form-control-lg"type="date" id="start_date" name="start_date" value="{{ $task->start_date->format('Y-m-d') }}"  />
                    </div>
                
                    <div class="col-md-4">
                        <label for="end_date">Fim</label>
                        <input class="form-control form-control-lg" type="date" id="end_date" name="end_date" value="{{ $task->end_date->format('Y-m-d') }}"  />
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
