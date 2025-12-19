@extends('layouts.app')
@section('titulo', 'Agendar Nueva Cita')
@section('contenido')
    <div class="card shadow-sm border-0 mx-auto" style="max-width: 600px;">
        <div class="card-header bg-dark text-white">
            <h2 class="h5 mb-0">Nueva Cita de Tatuaje</h2>
        </div>
        <div class="card-body p-4">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('citas.store') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-12">
                        <label class="form-label fw-bold">Nombre del Cliente</label>
                        <input type="text" name="cliente" class="form-control" placeholder=" " required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Telefono</label>
                        <input type="text" name="telefono" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Fecha y Hora</label>
                        <input type="datetime-local" name="fecha_hora" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label fw-bold">Zona del Cuerpo</label>
                        <input type="text" name="zona_cuerpo" class="form-control" placeholder=" " required>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label fw-bold">Descripcion del diseño tatuaje</label>
                        <textarea name="diseno" class="form-control" rows="3" placeholder=" "></textarea>
                    </div>
                </div>
                <div class="mt-4 d-flex justify-content-between">
                    <a href="{{ route('citas.index') }}" class="btn btn-light">CANCELAR</a>
                    <button type="submit" class="btn btn-dark">CONFIRMAR CITA</button>
                </div>
            </form>
        </div>
    </div>
@endsection
