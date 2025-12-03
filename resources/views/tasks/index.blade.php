@extends('layouts.app')

@section('content')
<div class="container">

@if(Session::has('mensaje'))
<div class="alert alert-success alert-dismissible" role="alert">
    {{ Session::get('mensaje') }}
</div>
@endif

<a href="{{ route('tasks.create') }}" class="btn btn-success mb-3">Registrar Nueva Tarea</a>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Descripción</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($tasks as $tk)
        <tr>
            <td>{{ $tk->id }}</td>
            <td>{{ $tk->name }}</td>
            <td>{{ $tk->description }}</td>
            <td>{{ $tk->id_state }}</td>

            <td class="align-middle text-center">
                <a href="{{ url('tasks/'.$tk->id.'/edit') }}" 
                   class="btn btn-warning btn-sm">Editar</a>

                <form action="{{ url('tasks/'.$tk->id) }}" method="POST" 
                      class="d-inline m-0">
                    @csrf
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger btn-sm" 
                            onclick="return confirm('¿Deseas Eliminar?')">
                        Eliminar
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $tasks->links() }}

</div>
@endsection
