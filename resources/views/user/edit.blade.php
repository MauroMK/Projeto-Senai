@extends("layouts.app")

@section('content')
<div class="card mx-auto">
    <div class="card-body">
        <div class="card-title">
            <h2><a class ="btn btn-primary" href="{{ route('user.list') }}"><i class="fa-solid fa-left-long"></i></a> Editar Usuário</h2>
        </div>
        <div class="card-text">
            <form method="POST" action="{{ route('user.update', $user->id) }}">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <label for="name">Nome</label>
                        <input class="form-control form-control-lg" value="{{ $user->name }}" type="text" id="name" name="name"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <label for="email" class="form-label">Email</label>
                        <input class="form-control form-control-lg" value="{{ $user->email }}" type="text" name="email" id="email" >
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <label for="password" class="form-label">Senha</label>
                        <input class="form-control form-control-lg" type="password" name="password" id="password" >
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
