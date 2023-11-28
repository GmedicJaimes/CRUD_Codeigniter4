<?php

namespace App\Models;

use CodeIgniter\Model;

class Libro extends Model
{
  //? $table y $primarykey son utilizados por todos los metodos CRUD
  protected $table      = 'libros';
  // Uncomment below if you want add primary key
  protected $primaryKey = 'id';

  //los nombres que esten dentro del array $allowedFields, seran los unicos que se podran manipular a través del modelo.
  protected $allowedFields = ['nombre', 'imagen', 'autor'];
}
