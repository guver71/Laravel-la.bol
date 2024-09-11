<?php

namespace App\Http\Controllers;

use App\Models\Trabajo;
use Illuminate\Http\Request;

class TrabajoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trabajos = Trabajo::all();
        return view('trabajos.index', compact('trabajos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('trabajos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:100',
            'descripcion' => 'required|string|min:3|max:500',
            'salario' => 'required|string|min:2|max:5'
        ]);

        Trabajo::create($request->all());
        return redirect()->route('trabajos.index');
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
        $trabajo = Trabajo::findOrFail($id);
        return view('trabajos.edit', compact('trabajo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:100',
            'descripcion' => 'required|string|min:3|max:500',
            'salario' => 'required|string|min:2|max:5'
        ]);

         // Buscar el estudiante por su ID
         $trabajo = Trabajo::findOrFail($id);

         // Actualizar los datos del estudiante
         $trabajo->update($request->all());

         // Redireccionar a la vista de listado de estudiantes
         return redirect()->route('trabajos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $trabajo = Trabajo::findOrFail($id);
        $trabajo->delete();
        return redirect()->route('trabajos.index');
    }
}
