@extends("layouts.app")

@section('content')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
    <script>
      tinymce.init({
        selector: 'textarea',
        readonly: true
      });
    </script>
<div class="card mx-auto">
    <div class="card-body">
        <div class="card-title">
            <h2><a class ="btn btn-primary" href="{{ route('project.list') }}"><i class="fa-solid fa-left-long"></i></a> Detalhes da tarefa {{ $project->id }}</h2>
        </div>
        <div class="card-text">
            <form method="POST" action="{{ route('project.update', $project->id) }}">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <label for="name">Título</label>
                        <h2> {{ $project->name }} </h2>
                    </div>
                    <div class="col-md-2">
                        <label for="tipo">Tipo: </label>
                        <h3>{{ $project->tipo }}</h3>
                    </div>
                    <div class="col-md-2">
                        <label for="prioridade">Prioridade: </label>
                        <h3>{{ $project->prioridade }}</h3>
                    </div>
                    <div class="col-md-2">
                        <label for="start_date">Data de criação</label>
                        <h3>{{ $project->created_at->format('d/m/Y') }}</h3>
                    </div>
                </div>
                <div>
                    <div class="col-md-3">
                        <label for="user_id">Responsável</label>
                        <select class="form-select form-select-lg" name="user_id" id="user_id" disabled>
                            <option value="">Selecione</option>
                            @foreach($users as $user)
                            <option {{ ($project->user_id == $user->id ? 'selected' : "") }} value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="observation" class="form-label">Descrição</label>
                        <textarea class="form-control form-control-lg" name="observation" id="observation">{{ $project->observation }}</textarea>
                    </div>
                </div>
                <div class="row">
                    
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
