@extends('layouts.app')

@section('content')

<style>
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
    setTimeout(function() {
        document.getElementById('success-alert').style.display = 'none';
    }, 3000); 
</script>
<div class="container">

<!-- Si el proceso funciona envia mensaje del controlador-->
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
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <ul style="list-style: none;">
                        @foreach($tasks as $task)
                        <li>
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
            <div class="row justify-content-center mt-4">
        <div class="col-md-12"  >
            <div class="card border-dark">
                <!--Tareas Completadas-->
                <div class="card-header  bg-dark text-white">{{ __('Tareas Completadas') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <ul style="list-style: none;">
                        @foreach($tasks as $task)
                        <li>
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
<div class="text-center mt-4">
                        <a href="{{route('task.create')}}" class="btn btn-success text-white" style="margin: top 10px;">Crear Tarea</a>
                    </div>

                 
                </div>
@endsection