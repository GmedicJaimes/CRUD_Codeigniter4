<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Libro;

class Libros extends Controller
{

  //? Creacion del metodo
  public function index()
  {

    return view('libros/listar');
  }
}
