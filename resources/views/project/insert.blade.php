@extends("layouts.app")

@section('content')
<div class="card mx-auto">
    <div class="card-body">
        <div class="card-title">
            <h2><a class ="btn btn-primary" href="{{ route('project.list') }}"><i class="fa-solid fa-left-long"></i></a> Inserir Projeto</h2>
        </div>
        <div class="card-text">
            <form method="POST" action="/project/store" class="row needs-validation" novalidate>
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <label for="name">Nome</label>
                        <input class="form-control form-control-lg" type="text" id="name" name="name" />
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="tipo">Tipo</label>
                        <select class="form-select form-select-lg" name="tipo" id="tipo" >
                            <option value="Incidente">Incidente</option>
                            <option value="Solicitação de Serviço">Solicitação de Serviço</option>
                            <option value="Melhoria">Melhorias</option>
                            <option value="Projeto">Projeto</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="prioridade">Prioridade</label>
                        <select class="form-select form-select-lg" name="prioridade" id="prioridade" >
                            <option value="Alta">Alta</option>
                            <option value="Média">Média</option>
                            <option value="Baixa">Baixa</option>
                            <option value="Sem prioridade">Sem prioridade</option>
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
                    <div class="col-md-12">
                        <label for="observation" class="form-label">Observação</label>
                        <textarea class="form-control form-control-lg" name="observation" id="observation" cols="15" rows="2"></textarea>
                    </div>
                </div>
                <div class="pt-3">
                    <button class="btn btn-success btn-lg" type="submit">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
