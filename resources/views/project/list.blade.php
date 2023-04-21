@extends("layouts.app")

@section('content')
<div class="card mx-auto">
    <div class="card-body">
        <div class="card-title">
            <h2>Lista de Tarefas</h2>
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
                            
                            <!-- <td>
                                <a class="btn btn-secondary" href="{{ route('project.edit', $project->id) }}">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </a>
                                <form class="d-inline" method="post" action="{{route('project.delete', $project->id)}}">
                                    @csrf
                                    <button value="Delete" type="submit" class="btn btn-danger">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                    @method('delete')    
                                </form>
                            </td> -->
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $projects->links() }}
        </div>
    </div>
</div>


@endsection
