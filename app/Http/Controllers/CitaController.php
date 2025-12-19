<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    public function index()
    {
        $citas = Cita::orderBy('fecha_hora', 'asc')->get();
        return view('citas.index', compact('citas'));
    }
    public function create()
    {
        return view('citas.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'cliente' => 'required|max:100',
            'telefono' => 'required',
            'fecha_hora' => 'required|after:now',
            'zona_cuerpo' => 'required',
        ]);

        Cita::create($request->all());
        return redirect()->route('citas.index')->with('success', 'La cita esta agendada.');
    }
    public function edit(Cita $cita)
    {
        return view('citas.edit', compact('cita'));
    }
    public function update(Request $request, Cita $cita)
    {
        $request->validate([
            'cliente' => 'required',
            'estado' => 'required',
        ]);

        $cita->update($request->all());
        return redirect()->route('citas.index')->with('success', 'LA cita esta actualizada.');
    }
    public function destroy(Cita $cita)
    {
        $cita->delete();
        return redirect()->route('citas.index')->with('success', 'La cita esta eliminada.');
    }
}
