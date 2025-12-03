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
    <label for="name" class="form-label fw-semibold">Título</label>
    <input 
        value="{{ isset($tasks->name) ? $tasks->name : old('name') }}"
        type="text"
        name="name"
        id="name"
        class="form-control form-control-lg"
        placeholder="Introduzca el título">
</div>

<div class="mb-3">
    <label for="description" class="form-label fw-semibold">Descripción</label>
    <input 
        value="{{ isset($tasks->description) ? $tasks->description : old('description') }}"
        type="text"
        name="description"
        id="description"
        class="form-control form-control-lg"
        placeholder="Introduzca la descripción">
</div>

@if(isset($tasks))
<div class="mb-3">
    <label for="id_state" class="form-label fw-semibold">Estado</label>
    <select name="id_state" id="id_state" class="form-control form-control-lg">
        @foreach($states as $st)
            <option value="{{ $st->id }}" 
                {{ isset($st->id) }}>
                {{ $st->name }}
            </option>
        @endforeach
    </select>
</div>
@endif


<div class="mt-4">
    <input type="submit" class="btn btn-warning btn-lg px-5" value="{{ $modo }} Registro">
</div>
