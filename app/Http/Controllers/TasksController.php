<?php

namespace App\Http\Controllers;

use App\Models\tasks;
use App\Models\states;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $tareas['tasks'] = tasks::where('id_user', auth()->user()->id)
                              ->paginate(5);
    return view('tasks.index', $tareas);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("tasks.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required|string|max:90',
        'description' => 'required|string|max:100',
    ], [
        'required' => 'El :attribute es requerido',
    ]);

    tasks::create([
        'name'        => $request->name,
        'description' => $request->description,
        'id_state'    => 1, 
        'id_user'    => auth()->user()->id, 
    ]);
    return redirect('tasks')->with('mensaje','Registro ingresado con exito.');

    }

    /**
     * Display the specified resource.
     */
    public function show(tasks $tasks)
    {
        //
    }

    public function edit($id)
    {
        $tasks = tasks::findOrFail($id);
        $states= states::all();

    return view('tasks.update', compact('tasks','states'));
    }

    public function update(Request $request, $id)
{
            $validacion = [
                'name'        => 'required|string|max:90',
                'description' => 'required|string|max:100',
                'id_state'    => 'required|integer',
            ];

            $msj = [
                'required' => 'El :attribute es requerido',
                'max'      => 'El :attribute supera el tamaño permitido',
            ];

            $this->validate($request, $validacion, $msj);

            $datos = $request->except(['_token', '_method']);

            $datos['id_user'] = auth()->user()->id;

            tasks::where('id', '=', $id)->update($datos);

            return redirect('tasks')->with('mensaje', 'Tarea actualizada exitosamente');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tasks $tasks,$id)
    {
        $task = tasks::findOrFail($id);
        tasks::destroy($id);
        return redirect('tasks')->with('mensaje', 'Tarea eliminada exitosamente.');
    }
}
