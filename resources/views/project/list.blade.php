@extends("layouts.app")

@section('content')
<div class="card mx-auto">
    <div class="card-body">
        <div class="card-title">
            <h2>Lista de Projetos</h2>
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
                    @foreach($projects as $project)
                    <tr>
                        <th scope="row">{{ $project->id }}</th>
                            <td>{{ $project->name }}</td>
                            <td>{{ $project->start_date->format('d/m/Y') }}</td>
                            <td>{{ $project->end_date->format('d/m/Y') }}</td>
                            <td>{{ $project->user->name }}</td>
                            <td>
                                <a class="btn btn-warning" href="{{ route('project.edit', $project->id) }}">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <a class="btn btn-success" href="{{ route('task.insert', $project->id) }}">
                                    <i class="fa-solid fa-plus"></i>
                                </a>
                                <a class="btn btn-primary" href="{{ route('task.list', $project->id) }}">
                                    <i class="fa-solid fa-list"></i>
                                </a>
                                <form class="d-inline" method="post" action="{{route('project.delete', $project->id)}}">
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
