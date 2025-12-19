@extends('layouts.app')
@section('titulo', 'Actualizar Cita')
@section('contenido')
    <div class="card shadow-sm border-0 mx-auto" style="max-width: 600px;">
        <div class="card-header bg-secondary text-white">
            <h2 class="h5 mb-0"> Editar Cita de {{ $cita->cliente }}</h2>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('citas.update', $cita) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <div class="col-md-12">
                        <label class="form-label fw-bold">Estado de la Cita</label>
                        <select name="estado" class="form-select border-primary shadow-sm">
                            <option value="agendada" {{ $cita->estado == 'agendada' ? 'selected' : '' }}> Agendada</option>
                            <option value="en proceso" {{ $cita->estado == 'en proceso' ? 'selected' : '' }}> En Proceso</option>
                            <option value="completada" {{ $cita->estado == 'completada' ? 'selected' : '' }}> Completada</option>
                            <option value="cancelada" {{ $cita->estado == 'cancelada' ? 'selected' : '' }}> Cancelada</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label fw-bold">Nombre del Cliente</label>
                        <input type="text" name="cliente" class="form-control" value="{{ $cita->cliente }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Telefono</label>
                        <input type="text" name="telefono" class="form-control" value="{{ $cita->telefono }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Fecha y Hora</label>
                        <input type="datetime-local" name="fecha_hora" class="form-control" value="{{ date('Y-m-d\TH:i', strtotime($cita->fecha_hora)) }}" required>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label fw-bold">Zona del cuerpo</label>
                        <input type="text" name="zona_cuerpo" class="form-control" value="{{ $cita->zona_cuerpo }}" required>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label fw-bold">Descripcion del diseño tatuaje</label>
                        <textarea name="diseno" class="form-control" rows="3">{{ $cita->diseno }}</textarea>
                    </div>
                </div>
                <div class="mt-4 d-flex justify-content-between">
                    <a href="{{ route('citas.index') }}" class="btn btn-light">ATRAS</a>
                    <button type="submit" class="btn btn-success">GUARDAR CAMBIOS</button>
                </div>
            </form>
        </div>
    </div>
@endsection
