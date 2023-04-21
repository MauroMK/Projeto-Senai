@extends("layouts.app")

@section('content')
<script src="https://cdn.tiny.cloud/1/nk3yxbzaul8fgfj9d0fl1xn225z7ggyzpibcs8zo79nyn0wv/tinymce/6/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'autoresize'
    });
</script>
<div class="card mx-auto">
    <div class="card-body">
        <div class="card-title">
            <h2><a class ="btn btn-primary" href="{{ route('project.list') }}"><i class="fa-solid fa-left-long"></i></a> Detalhes da tarefa {{ $project->id }}</h2>
        </div>
        <div class="card-text">
                <form method="POST" action="{{ route('project.finish', $project->id) }}">
                @csrf
                
                <div class="row">
                    <div class="col-md-3">
                        <label for="name">Título</label>
                        <input class="form-control form-control-lg" value="{{ $project->name }}" type="text" id="name" name="name" readonly/>
                    </div>
                    <div class="col-md-1">
                        <label for="tipo">Tipo: </label>
                        <h4>{{ $project->tipo }}</h4>
                    </div>
                    <div class="col-md-1">
                        <label for="prioridade">Prioridade: </label>
                        <h4>{{ $project->prioridade }}</h4>
                    </div>
                    <div class="col-md-1">
                        <label for="start_date">Data de criação</label>
                        <h4>{{ $project->created_at->format('d/m/Y') }}</h4>
                    </div>
                    <div class="col-md-1">
                        <label for="user_id">Responsável</label>
                        <h4>{{ $project->user->name }}</h4>
                    </div>
                    <div class="col-md-1">
                        <label for="situacao">Situação</label>
                        <h4>{{ $project->situacao ? "Aberta" : "Concluída" }}</h4>
                    </div>
                </div>
                    <div class="col-md-6">
                        <label for="descricao" class="form-label">Descrição</label>
                        <textarea class="form-control form-control-lg" name="descricao" id="descricao" cols="10" rows="5"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Finalizar Tarefa</button>
                    @method('put')
                </form>        
        </div>
    </div>
</div>


@endsection
