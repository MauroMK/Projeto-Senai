@extends("layouts.app")

@section('content')
<script src="https://cdn.tiny.cloud/1/nk3yxbzaul8fgfj9d0fl1xn225z7ggyzpibcs8zo79nyn0wv/tinymce/6/tinymce.min.js"></script>
    <script>
      tinymce.init({
        selector: '#descricao',
        readonly: true
      });

      tinymce.init({
        selector: '#observacao',
        readonly: {{ $project->user_id == auth()->user()->id && $project->situacao == 'situacao' ? 'false' : 'true' }}
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
                        <div class="col-md-3">
                            <ul><strong>Prioridade: </strong>{{ $project->prioridade }}</ul>
                            <ul><strong>Tipo: </strong> {{ $project->tipo }}</ul>
                        </div>
                        
                        <div class="col-md-1">
                            <label for="start_date">Data de criação</label>
                            <h4>{{ $project->created_at->format('d/m/Y') }}</h4>
                        </div>
                        <div class="col-md-1">
                            <label for="user_id">Responsável</label>
                            <h4>{{ $project->user->name }}</h4>
                        </div>
                        <div class="col-md-2">
                            <label for="situacao">Situação</label>
                            <h4>{{ $project->situacao ? "Aberta" : "Concluída" }}</h4>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <label for="descricao" class="form-label"></label>
                            <h4>Descrição</h4>
                            <textarea class="form-control form-control-lg" name="descricao" id="descricao" maxlength="255">{{ $project->descricao }}</textarea>
                        </div>
                        <div class="col-md-4">
                            <label for="observacao" class="form-label"></label>
                            <h4>Observação</h4>
                            <textarea class="form-control form-control-lg" name="observacao" id="observacao" maxlength="255">{{ $project->observacao }}</textarea>
                        </div>
                        <div class="col d-flex flex-column justify-content-center">
                            <h4 class="align-self-start">Ultima alteração: </h4>
                            <h5 class="align-self-start">Usuário: {{ $project->responsavel_alteracao}} </h5>
                            <h5 class="align-self-start">Data: {{ $project->data_alteracao }} </h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1 pt-2">
                            @if ($project->situacao && $project->user_id == auth()->user()->id)
                            <button class="btn btn-success btn-lg" type="submit">Salvar</button>
                            @else
                            <button class="btn btn-success btn-lg" type="submit" disabled>Salvar</button>
                            @endif
                        </div>
                        <div class="col-md-1 pt-2">
                            @if ($project->situacao && $project->user_id == auth()->user()->id)
                                <a href="{{ route('project.finishForm', $project->id) }}" class="btn btn-primary btn-lg">Finalizar</a>
                            @endif
                        </div>
                    </div>
                </div>
                @method('put')
            </form>
            <div class="col-md-1 pt-2">
                @if($project->situacao == false && $project->user_id == auth()->user()->id)
                <form method="POST" action="{{ route('project.finalize', $project->id) }}" novalidate>
                    @csrf
                    @method('put')
                    <button type="submit" class="btn btn-danger btn-lg">Fechar tarefa</button>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>


@endsection
