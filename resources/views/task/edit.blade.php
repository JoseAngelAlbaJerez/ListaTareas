@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-dark">
            {{-- Encabezado de la tarjeta --}}
                <div class="card-header bg-dark text-white">{{ __('Editar Tarea') }}</div>

                {{-- Cuerpo de la tarjeta --}}
                <div class="card-body">
                {{-- Formulario para actualizar la tarea --}}
                    <form method="POST" action="{{ route('task.update', $task->id) }}">
                        @csrf
                        @method('PUT')

                        {{-- Campo para el título --}}
                        <div class="form-group">
                            <label for="title">{{ __('Titulo') }}</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ $task->title }}">
                        </div>
                        {{-- Campo para la descripción --}}
                        <div class="form-group" style="margin-top: 10px;">
                            <label for="description">{{ __('Descripcion') }}</label>
                            <textarea name="description" id="description" class="form-control">{{ $task->description }}</textarea>
                        </div>
                        {{-- Campo para marcar la tarea como completada --}}
                        <div class="form-group" style="margin-top: 10px;">
                            <label for="completed">{{ __('Completada') }}</label>
                            <input type="checkbox" name="completed" id="completed" value="1" {{ $task->completed ? 'checked' : '' }}>
                        </div>
                        {{-- Botones para enviar el formulario o cancelar --}}
                        <button type="submit" class="btn btn-success" style="margin-top: 10px;">{{ __('Actualizar Tarea') }}</button>
                        <a href="{{ route('home') }}" class="btn btn-danger" style="margin-top: 10px;">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
