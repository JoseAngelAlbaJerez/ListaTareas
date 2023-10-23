<?php

namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\Task;
    use Illuminate\Support\Facades\Session;
    class TaskController extends Controller
    {
        public function index()
        {
            $user = auth()->user();
            $tasks = $user->tasks;
            return view('home', ['tasks' => $tasks]);
        }
        
        public function create()
        {
            return view('task.create');
        }
        
        public function store(Request $request)
        {
            $request->validate([
                'title' => 'required',
                'description' => 'required',
            ]);
        
            $task = new Task;
            $task->title = $request->input('title');
            $task->description = $request->input('description');
            $task->completed = $request->input('completed', 0);
            $task->user_id = auth()->user()->id; 
            $task->save();
        
            Session::flash('success', 'La tarea se ha guardado exitosamente.');
        
            return redirect('/tasks');
        }
        
        
        
        public function edit($id)
        {
            $task = Task::find($id);
            return view('task.edit', ['task' => $task]) ;
            
            
        }
        
        public function update(Request $request, $id)
        {
            $task = Task::find($id);
            $task->title = $request->input('title');
            $task->description = $request->input('description');
            $task->completed = $request->has('completed') ? 1 : 0;
            
            $task->save();
        
            return redirect('/tasks');
        }
        
        
        public function destroy($id)
        {
            $task = Task::find($id);
            $task->delete();
            Session::flash('success', 'La tarea se ha elimino exitosamente.');
            return redirect('/tasks');
        }
       
    }
