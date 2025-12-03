<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users['user']= User::paginate(5);
        return view('users.index', $users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("users.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('users.update', compact('user','roles'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    
    $request->validate([
        'name'  => 'required|string|max:90',
        'email' => 'required|email|max:100',
        'role_id' => 'required|exists:roles,id'
    ], [
        'required' => 'El :attribute es requerido',
    ]);


    $user = User::findOrFail($id);


    $datos = $request->except(['_token', '_method']);

    $user->update($datos);

    return redirect('users')->with('mensaje', 'Usuario actualizado exitosamente');
}

public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->tasks()->delete(); 
    $user->delete();
    return redirect('users')->with('mensaje', 'Usuario eliminado exitosamente');
}
}
