<?php

namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\Task;
    use Illuminate\Support\Facades\Session;
    class TaskController extends Controller
    {
        public function index()
        {
            //Obtiene el usuario autenticado
            $user = auth()->user();


            //Toma las tareas asociadas a ese usuario autenticado
            $tasks = $user->tasks;

             //Devuelve la vista 'home', pasando las tareas sacadas de modelo como datos
            return view('home', ['tasks' => $tasks]);
        }
        
        public function create()
        {
            //Devuelve la Vista para crear una tarea
            return view('task.create');
        }
        
        public function store(Request $request)
        {
            //Valida los datos requeridos
            $request->validate([
                'title' => 'required',
                'description' => 'required',
            ]);
        
            //Crea una instancia de la clase Task. Toma como input y guarda sus atributos
            $task = new Task;
            $task->title = $request->input('title');
            $task->description = $request->input('description');
            $task->completed = $request->input('completed', 0);
            $task->user_id = auth()->user()->id; 
            $task->save();
        

            //Mensaje de succeso 
            Session::flash('success', 'La tarea se ha guardado exitosamente.');
            
            //redirecciona al inicio luego de que guarde
            return redirect('/tasks');
        }

        
        
        
        public function edit($id)
        {

            //Me busca un id en la clase Task
            $task = Task::find($id);

            //Me devuelve una vista para editar pasando la tarea como datos
            return view('task.edit', ['task' => $task]) ;   
        }
        
        public function update(Request $request, $id)
        { //Me busca un id en la clase Task y sigue la misma metodologia del store
            $task = Task::find($id);
            $task->title = $request->input('title');
            $task->description = $request->input('description');

            //Pregunta si la tarea esta completada o no
            $task->completed = $request->has('completed') ? 1 : 0;
            
            $task->save();
            //Redirecciona a inicio
            return redirect('/tasks');
        }
        
        
        public function destroy($id)
        {
            //Encuentra un id en la Clase Task
            $task = Task::find($id);
            //Borra la tarea asignada a el id
            $task->delete();

            //Envia el mensaje de succeso
            Session::flash('success', 'La tarea se ha elimino exitosamente.');
          
            //Redirecciona a inicio
            return redirect('/tasks');
        }
       
    }
