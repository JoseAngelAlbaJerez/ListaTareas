<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //Inicializa el middleware de autenticacion de ui
        $this->middleware('auth');
    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
{
    //Toma todas las tareas del Modelo de Tareas
    $tasks = Task::all();

    //Devuelve la vista 'home', pasando las tareas sacadas de modelo como datos
    return view('home', ['tasks' => $tasks]);
}
   

  
}
