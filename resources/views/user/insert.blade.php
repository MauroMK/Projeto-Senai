@extends("layouts.app")

@section('content')
<div class="card mx-auto">
    <div class="card-body">
        <div class="card-title">
            <h2><a class ="btn btn-primary" href="{{ route('user.list') }}"><i class="fa-solid fa-left-long"></i></a> Adicionar usuário</h2>
        </div>
        <div class="card-text">
            <form method="POST" action="/user/store" class="row needs-validation" novalidate>
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <label for="name">Nome</label>
                        <input class="form-control form-control-lg" type="text" id="name" name="name" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="email">Email</label>
                        <input class="form-control form-control-lg" type="text" name="email" id="email" >
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="password">Senha</label>
                        <input class="form-control form-control-lg" type="password" name="password" id="password" >
                    </div>
                </div>
                    <div class="pt-3">
                        <button class="btn btn-success btn-lg" type="submit">Criar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
