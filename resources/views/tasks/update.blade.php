@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ url('/tasks/'.$tasks->id) }}" method="POST">
    @csrf
    {{ method_field('PATCH') }}

    @include('tasks.form', ['modo' => 'Actualizar', 'tasks' => $tasks])

</form>

</div>
@endsection
