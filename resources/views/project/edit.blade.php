@extends("layouts.app")

@section('content')
<script src="https://cdn.tiny.cloud/1/nk3yxbzaul8fgfj9d0fl1xn225z7ggyzpibcs8zo79nyn0wv/tinymce/6/tinymce.min.js"></script>
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
        @if($project->user_id != auth()->user()->id)
        <form method="post" action="{{ route('project.assignToMe', $project->id) }}">
            @csrf
            <button class="btn btn-primary">Assumir tarefa</button>
        </form>
        @endif
        <div class="card-text">
            <form method="POST" action="{{ route('project.update', $project->id) }}">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <label for="name">Título</label>
                        <input class="form-control form-control-lg" value="{{ $project->name }}" type="text" id="name" name="name" readonly/>
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
                        <h2>{{ $project->user->name }}</h2>
                    </div>
                    <div class="col-md-3">
                        <label for="situacao">Situação</label>
                        <h2>{{ $project->situacao ? "Aberta" : "Concluída" }}</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="observation" class="form-label">Descrição</label>
                        <textarea class="form-control form-control-lg" name="observation" id="observation">{{ $project->observation }}</textarea>
                    </div>
                </div>
                <div class="pt-3">
                    <button class="btn btn-success btn-lg" type="submit">Salvar</button>
                </div>            
                @method('put')
            </form>
                @if ($project->situacao && $project->user_id == auth()->user()->id)
                    <a href="{{ route('project.finishForm', $project->id) }}" class="btn btn-primary">Finalizar Tarefa</a>
                @endif
        </div>
    </div>
</div>


@endsection
