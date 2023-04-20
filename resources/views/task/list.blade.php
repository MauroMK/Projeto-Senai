@extends("layouts.app")

@section('content')
<div class="card mx-auto">
    <div class="card-body">
        <div class="card-title">
            <h2><button class ="btn btn-primary" onclick="history.back()"><i class="fa-solid fa-left-long"></i></button> Lista de Tarefas</h2>
        </div>
        <div class="card-text">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Data Inicial</th>
                        <th scope="col">Data Final</th>
                        <th scope="col">Responsável</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                    <tr>
                        <th scope="row">{{ $task->id }}</th>
                            <td>{{ $task->name }}</td>
                            <td>{{ $task->start_date->format('d/m/Y') }}</td>
                            <td>{{ $task->end_date->format('d/m/Y') }}</td>
                            <td>{{ $task->user->name }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('task.edit', $task->id) }}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form class="d-inline" method="post" action="{{route('task.delete', $task->id)}}">
                                    @csrf
                                    <button value="Delete" type="submit" class="btn btn-danger">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                    @method('delete')    
                                </form>
                            </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
