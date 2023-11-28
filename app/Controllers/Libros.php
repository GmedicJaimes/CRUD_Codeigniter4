<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Libro;

class Libros extends Controller
{

  //? Creacion del metodo
  public function index()
  {
    //? consultar la informacion
    $libro = new Libro();
    $datos['libros'] = $libro->orderBy('id', 'ASC')->findAll();

    $datos['cabecera'] = view('template/cabecera');
    $datos['pie'] = view('template/piepagina');

    return view('libros/listar', $datos);
  }


  public function crear()
  {
    $datos['cabecera'] = view('template/cabecera');
    $datos['pie'] = view('template/piepagina');

    return view('libros/crear', $datos);
  }

  public function guardar()
  {
    $libro = new Libro(); //? creo una nueva instancia, que me permite capturar toda la informacion y meterla en la base de datos.

    //Realizo un if para preguntar si la imagen existe
    if ($imagen = $this->request->getFile('imagen')) {
      //creo una nueva variable, y guardo el valor de imagen
      $nuevoNombre = $imagen->getRandomName();
      $imagen->move('../public/uploads/', $nuevoNombre);

      $datos = [
        'nombre' => $this->request->getVar('nombre'),
        'autor' => $this->request->getVar('autor'),
        'imagen' => $nuevoNombre
      ];

      $libro->insert($datos);
    }

    echo 'Ingresado a la BD';
  }


  public function borrar($id = null)
  {


    echo 'Borrar registro' . $id;
  }
}
