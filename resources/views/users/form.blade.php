<h1 class="mb-4">{{ $modo }} Tarea</h1>

@if(count($errors) > 0)
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="mb-3">
    <label for="name" class="form-label fw-semibold">Nombre</label>
    <input 
        value="{{ isset($user->name) ? $user->name : old('name') }}"
        type="text"
        name="name"
        id="name"
        class="form-control form-control-lg"
        placeholder="Introduzca el nombre">
</div>

<div class="mb-3">
    <label for="description" class="form-label fw-semibold">Email</label>
    <input 
        value="{{ isset($user->email) ? $user->email : old('email') }}"
        type="email"
        name="email"
        id="email"
        class="form-control form-control-lg"
        placeholder="Introduzca el email">
</div>

@if(isset($user))
<div class="mb-3">
    <label for="role_id" class="form-label fw-semibold">Estado</label>
    <select name="role_id" id="role_id" class="form-control form-control-lg">
        @foreach($roles as $rl)
            <option value="{{ $rl->id }}" 
                {{ isset($rl->id) }}>
                {{ $rl->name }}
            </option>
        @endforeach
    </select>
</div>
@endif


<div class="mt-4">
    <input type="submit" class="btn btn-warning btn-lg px-5" value="{{ $modo }} Registro">
</div>
