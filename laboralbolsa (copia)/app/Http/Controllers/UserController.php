<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Mostrar los usuarios pendientes de aprobación.
     */
    public function pending()
    {
        $usuariosPendientes = User::where('estatus', false)->get();
        return view('users.pending', compact('usuariosPendientes'));
    }

    /**
     * Aprobar un usuario.
     */
    public function approve(User $user)
    {
        $user->estatus = true; // Aprobar al usuario
        $user->save();

        return redirect()->route('users.pending')->with('success', 'Usuario aprobado exitosamente.');
    }

    /**
     * Rechazar (eliminar) un usuario.
     */
    public function reject(User $user)
    {
        $user->delete(); // Eliminar al usuario rechazado
        return redirect()->route('users.pending')->with('success', 'Usuario rechazado y eliminado.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:2',
            'dni' => 'required|string|max:15',
            'ruc' => 'required|string|max:30',
            'celular' => 'required|string|max:15',
            'rol' => 'required|in:1,2,3,4'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'dni' => $request->dni,
            'ruc' => $request->ruc,
            'celular' => $request->celular,
            'rol' => $request->rol,
            'estatus' => false, // El usuario debe ser aprobado por un administrador
        ]);

        return redirect('/')->with('success', 'Usuario registrado exitosamente. Esperando aprobación.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|min:1|max:100',
            'email' => 'required|email|unique:users,email,' . $id,
            'dni' => 'required|string|max:15',
            'ruc' => 'required|string|max:30',
            'celular' => 'required|string|max:15',
            'rol' => 'required|in:1,2,3,4'
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index');
    }
}
