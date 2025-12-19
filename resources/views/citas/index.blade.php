@extends('layouts.app')
@section('titulo', 'Agenda de Citas - Ink Masters')
@section('contenido')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3"> AGENDA DE DIEGO</h1>
        <a href="{{ route('citas.create') }}" class="btn btn-dark shadow-sm">+ Agendar Cita</a>
    </div>

    <div class="table-responsive bg-white shadow-sm rounded">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-dark">
            <tr>
                <th>Cliente / Diseño</th>
                <th>Zona</th>
                <th>Fecha y Hora</th>
                <th>Estado</th>
                <th class="text-center">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($citas as $cita)
                <tr>
                    <td>
                        <strong>{{ $cita->cliente }}</strong><br>
                        <small class="text-muted">{{ Str::limit($cita->diseno, 30) }}</small>
                    </td>
                    <td><span class="badge bg-light text-dark border">{{ $cita->zona_cuerpo }}</span></td>
                    <td>
                        {{ \Carbon\Carbon::parse($cita->fecha_hora)->format('d/m/Y') }}<br>
                        <small class="fw-bold">{{ \Carbon\Carbon::parse($cita->fecha_hora)->format('H:i A') }}</small>
                    </td>
                    <td>
                        @php
                            $color = [
                                'agendada' => 'primary',
                                'en proceso' => 'warning text-dark',
                                'completada' => 'success',
                                'cancelada' => 'danger'
                            ][$cita->estado];
                        @endphp
                        <span class="badge bg-{{ $color }}">{{ ucfirst($cita->estado) }}</span>
                    </td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a href="{{ route('citas.edit', $cita) }}" class="btn btn-sm btn-outline-secondary">
                                EDITAR
                            </a>
                            <form action="{{ route('citas.destroy', $cita) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Eliminar cita?')">
                                    BORRAR
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
