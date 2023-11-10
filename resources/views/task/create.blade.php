@extends('layouts.app')

@section('content')

{{-- Comprueba y muestra mensajes de error si hay alguno --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-card" >
            {{-- Encabezado de la tarjeta --}}
                <div class="card-header bg-dark text-white">{{ __('Crear Tarea') }}</div>
                {{-- Cuerpo de la tarjeta --}}
                <div class="card-body">
                {{-- Formulario para crear una nueva tarea --}}
                    <form method="POST" action="{{ route('task.store') }}">
                        @csrf
                        {{-- Campo para el título --}}
                        <div class="form-group " style="margin-top: 10px;">
                            <label for="title">{{ __('Titulo') }}</label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>
                        {{-- Campo para la descripción --}}
                        <div class="form-group" style="margin-top: 10px;">
                            <label for="description">{{ __('Descripcion') }}</label>
                            <textarea name="description" id="description" class="form-control"></textarea>
                        </div>
                        
                        
                        {{-- Botones para enviar el formulario o cancelar --}}
                        <button type="submit" class="btn btn-success" style="margin-top: 10px;">{{ __('Crear Tarea') }}</button>
                        <a href="{{ route('tasks') }}" class="btn btn-danger" style="margin-top: 10px;">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
