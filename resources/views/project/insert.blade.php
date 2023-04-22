@extends("layouts.app")

@section('content')
<div class="card mx-auto">
    <div class="card-body">
        <div class="card-title">
            <h2><a class ="btn btn-primary" href="{{ route('project.list') }}"><i class="fa-solid fa-left-long"></i></a> Inserir Tarefa</h2>
        </div>
        <div class="card-text">
                
            <form method="POST" action="/project/store" class="row needs-validation" novalidate>
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <label for="name">Título</label>
                        <input class="form-control form-control-lg" type="text" id="name" name="name">
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
                    
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="descricao" class="form-label"></label>
                        <h4>Descrição</h4>
                        <textarea class="form-control form-control-lg" name="descricao" id="descricao" maxlength="255"></textarea>
                    </div>
                </div>
                <div class="pt-3">
                    <button class="btn btn-success btn-lg" id="criar" type="submit">Criar</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
