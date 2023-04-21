@extends("layouts.app")

@section('content')
<div class="card mx-auto">
    <div class="card-body">
        <div class="card-title">
            <div class="row">
                <h2 class="col">Lista de Tarefas</h2>
                <div class="col-m-2 pt-2">
                    <a href="{{ route('project.insert') }}" class="btn btn-primary btn-lg">Criar Tarefa</a>
                </div>
            </div>
        </div>
        <div class="card-text">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Título</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Prioridade</th>
                        <th scope="col">Data de abertura</th>
                        <th scope="col">Responsável</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)
                    <tr class="{{ $project->user_id == auth()->user()->id ? 'bg-warning' : '' }}">
                        <th scope="row">
                            <a href="{{ route('project.edit', $project->id) }}">
                                {{ $project->id }}
                            </a>
                            <td>{{ $project->name }}</td>
                            <td>{{ $project->tipo }}</td>
                            <td>{{ $project->prioridade }}</td>
                            <td>{{ $project->created_at->format('d/m/Y') }}</td>
                            <td>{{ $project->user->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $projects->links() }}
        </div>
    </div>
</div>


@endsection
