@extends("layouts.app")

@section('content')
<div class="card mx-auto">
    <div class="card-body">
        <div class="card-title">
            <h2>Lista de Usuários</h2>
        </div>
        <div class="card-text">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Data de criação</th>
                        <!-- <th scope="col w-100">Ação</th> -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td scope="row">{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('d/m/Y') }}</td>
                        <!-- <td>
                            <form method="post" action="{{route('user.delete', $user->id)}}">
                                <a class="btn btn-primary m-1" href="{{ route('user.edit', $user->id) }}">
                                    <i class="fa-solid fa-user-pen"></i>
                                </a>
                                @csrf
                                <button value="Delete" type="submit" class="btn btn-danger m-1"><i class="fa-solid fa-trash-can"></i></button>
                                @method('delete')    
                            </form>
                        </td> -->
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
