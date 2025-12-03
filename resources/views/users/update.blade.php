@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ url('/users/'.$user->id) }}" method="POST">
    @csrf
    {{ method_field('PATCH') }}

    @include('users.form', ['modo' => 'Actualizar', 'users' => $user])

</form>

</div>
@endsection
