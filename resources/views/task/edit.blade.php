@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-dark">
                <div class="card-header bg-dark text-white">{{ __('Editar Tarea') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('task.update', $task->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="title">{{ __('Titulo') }}</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ $task->title }}">
                        </div>

                        <div class="form-group" style="margin-top: 10px;">
                            <label for="description">{{ __('Descripcion') }}</label>
                            <textarea name="description" id="description" class="form-control">{{ $task->description }}</textarea>
                        </div>

                        <div class="form-group" style="margin-top: 10px;">
                            <label for="completed">{{ __('Completada') }}</label>
                            <input type="checkbox" name="completed" id="completed" value="1" {{ $task->completed ? 'checked' : '' }}>
                        </div>

                        <button type="submit" class="btn btn-success" style="margin-top: 10px;">{{ __('Actualizar Tarea') }}</button>
                        <a href="{{ route('home') }}" class="btn btn-danger" style="margin-top: 10px;">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
