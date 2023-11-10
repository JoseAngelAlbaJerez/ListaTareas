<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
      // Especifica los campos que pueden ser asignados masivamente
    protected $fillable = ['title', 'description', 'completed'];

    
    public function user()
    {
         // Establece la relación de pertenencia (una tarea pertenece a un usuario)
        return $this->belongsTo(User::class, 'user_id');
    }
}
