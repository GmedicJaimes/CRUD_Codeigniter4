<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Libro;

class Libros extends Controller
{
  //? Creacion del metodo
  public function index()
  {
    //consultar la informacion
    //se crea una nueva instancia de la clase libro
    $libro = new Libro();

    //se consulta la base de datos, para obtener todos los libros con el metodo findAll(), ordenados por el campo id, de forma ascendente y se almacena en el array $datos con la clave 'libros'
    $datos['libros'] = $libro->orderBy('id', 'ASC')->findAll();

    //se agregan dos vistas, al array $datos, con las claves cabecera y pie. 
    $datos['cabecera'] = view('template/cabecera');
    $datos['pie'] = view('template/piepagina');

    //retorna una vista, llamda libros/listar y le paso el array $datos
    return view('libros/listar', $datos);
  }


  public function crear()
  {
    //se crea un array vacio llamado $datos
    //agrego una vista llamada cabecera al array $datos, con la clave cabecera
    $datos['cabecera'] = view('template/cabecera');
    //agrego una vista llamada piepagina al array $datos, con la clave pie
    $datos['pie'] = view('template/piepagina');


    //devuelvo la vista libros/crear y le paso el array $datos
    return view('libros/crear', $datos);
  }

  public function guardar()
  {
    $libro = new Libro(); //? creo una nueva instancia, que me permite capturar toda la informacion y meterla en la base de datos.

    //Realizo un if para preguntar si la imagen existe
    if ($imagen = $this->request->getFile('imagen')) {
      //creo una nueva variable, y le indico que me cree un nombre random al momento de guardarla
      $nuevoNombre = $imagen->getRandomName();
      //indico, que al momento de guardar la imagen, la mueva a esa direccion
      $imagen->move('../public/uploads/', $nuevoNombre);

      //array de valores guardados por el form
      $datos = [
        //guardo en cada variable, el valor que recibo del form, de su input correspondiente
        'nombre' => $this->request->getVar('nombre'),
        'autor' => $this->request->getVar('autor'),
        'imagen' => $nuevoNombre
      ];

      //inserto la informacion del form, en mi tabla libro de mi base de datos
      $libro->insert($datos);
    }

    echo 'Ingresado a la BD';
  }


  public function borrar($id = null)
  {


    echo 'Borrar registro' . $id;
  }
}
