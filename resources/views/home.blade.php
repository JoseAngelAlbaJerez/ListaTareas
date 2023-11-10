@extends('layouts.app')

@section('content')

<style>
    /* Estilos CCS para los botones y la Alerta  */
.btn-danger {
    width: 50%;
    padding: 5px 10px;
    float: right;
}
.btn-warning{
    width: 50%;
    padding: 5px 10px;
    float: right;
}
.btn-success{
    margin: auto;
  width: 0%;
  right: 0px;
  width: 300px;


  padding: 10px;
  
}
#success-alert {
    transition: opacity 0.5s ease-in-out;
}



</style>

<script>
    // Script para ocultar el mensaje de éxito despues de 3 segundos
    setTimeout(function() {
        document.getElementById('success-alert').style.display = 'none';
    }, 3000); 
</script>
<div class="container">

<!-- Si la Session envia un mensaje del controlador se crea un contenedor para la alerta-->
@if(Session::has('success'))
    <div class="alert alert-success" id="success-alert">
        {{ Session::get('success') }}
    </div>
@endif



    <div class="row justify-content-center">
        <div class="col-md-12"  >
            <div class="card border-dark">
                <!--Tareas Pendientes-->
                <div class="card-header  bg-dark text-white">{{ __('Tareas Pendientes') }}</div>

                <div class="card-body">
                {{-- Muestra un mensaje de éxito si hay alguno --}}
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{-- Lista de tareas pendientes --}}
                    <ul style="list-style: none;">
                        @foreach($tasks as $task)
                        <li>
                        {{-- Verifica si la tarea pertenece al usuario actual y está sin completar --}}
                            @if($task->user_id === auth()->user()->id && $task->completed == 0)
                            <div class="row" style="border-bottom: 1px solid #ccc; padding: 10px 0;">
                                <div class="col-8">
                                    <input type="checkbox" style="padding:30px;" name="completed" {{ $task->completed ? 'checked' : '' }}>
                                    <b style="font-size: large;">{{ $task->title }}</b>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{{ route('task.edit', $task->id) }}" class="btn btn-warning text-white">Editar</a>
                                    <form action="{{ route('task.delete', $task->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger text-white">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                            <p>{{ $task->description }}</p>
                            </li>
                            @endif
                         @endforeach
                    </ul>
                    

                 
                </div>
                
                
            </div>

            {{-- Lista de Tareas Completadas --}}
            <div class="row justify-content-center mt-4">
        <div class="col-md-12"  >
            <div class="card border-dark">

                <div class="card-header  bg-dark text-white">{{ __('Tareas Completadas') }}</div>
                {{-- Muestra un mensaje de éxito si hay alguno --}}
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    {{-- Lista de tareas completadas --}}
                    <ul style="list-style: none;">
                        @foreach($tasks as $task)
                        <li>
                        {{-- Verifica si la tarea pertenece al usuario actual y está completada --}}
                            @if($task->user_id === auth()->user()->id && $task->completed == 1)
                            <div class="row" style="border-bottom: 1px solid #ccc; padding: 10px 0;">
                                <div class="col-8">
                                    <input type="checkbox" style="padding:30px;" name="completed" {{ $task->completed ? 'checked' : '' }}>
                                    <b style="font-size: large;">{{ $task->title }}</b>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{{ route('task.edit', $task->id) }}" class="btn btn-warning text-white">Editar</a>
                                    <form action="{{ route('task.delete', $task->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger text-white">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                            <p>{{ $task->description }}</p>
                            </li>
                            @endif
                         @endforeach
                    </ul>
</div>
</div>
{{-- Botón para crear una nueva tarea --}}
<div class="text-center mt-4">
                        <a href="{{route('task.create')}}" class="btn btn-success text-white" style="margin: top 10px;">Crear Tarea</a>
                    </div>

                 
                </div>
@endsection