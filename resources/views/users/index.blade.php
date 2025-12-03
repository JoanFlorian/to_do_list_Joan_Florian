@extends('layouts.app')

@section('content')
<div class="container">

@if(Session::has('mensaje'))
<div class="alert alert-success alert-dismissible" role="alert">
    {{ Session::get('mensaje') }}
</div>
@endif

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Correo</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($user as $us)
        <tr>
            <td>{{ $us->id }}</td>
            <td>{{ $us->name }}</td>
            <td>{{ $us->email }}</td>
            <td>{{ $us->role_id  }}</td>

            <td class="align-middle text-center">
                <a href="{{ url('users/'.$us->id.'/edit') }}" 
                   class="btn btn-warning btn-sm">Editar</a>

                
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $user->links() }}

</div>
@endsection
