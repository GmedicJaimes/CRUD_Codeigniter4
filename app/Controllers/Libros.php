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
    //se crea una nueva instancia de la clase libro, para poder usar la informacion de nuestro modelo
    $libro = new Libro();

    //se consulta la base de datos, para obtener todos los libros con el metodo findAll(), ordenados por el campo id, de forma ascendente y se almacena en el array $datos con la clave 'libros'
    $datos['libros'] = $libro->orderBy('id', 'asc')->findAll();

    //se agregan dos vistas, al array $datos, con las claves cabecera y pie. 
    $datos['cabecera'] = view('template/cabecera');
    $datos['pie'] = view('template/piepagina');

    //retorna una vista, llamada libros/listar y le paso el array $datos
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

    //Realizo un if para preguntar si la imagen ha sido enviada, si es asi, realiza el siguiente codigo
    if ($imagen = $this->request->getFile('imagen')) {
      //creo una nueva variable, y le indico que me asigne un nombre random al momento de guardarla
      $nuevoNombre = $imagen->getRandomName();
      //indico, que al momento de guardar la imagen, la mueva a esa direccion.
      $imagen->move('../public/uploads/', $nuevoNombre);

      //array de valores guardados por el form
      $datos = [
        //guardo en cada clave, el valor que recibo del form, de su input correspondiente
        'nombre' => $this->request->getVar('nombre'),
        //guardo en la clave, lo recibido a traves de la solicitud que se hace por medio de $this->request y el getVar, lo usamos para obtener el valor de un parametro de la solicitud enviada por el form
        'autor' => $this->request->getVar('autor'),
        'imagen' => $nuevoNombre
      ];

      //inserto la informacion del form, en mi tabla libro de mi base de datos
      $libro->insert($datos);
    } 

    return $this->response->redirect(site_url('/listar'));
  }


  public function borrar($id = null)
  {

    //se crea una nueva instancia de libro, y ejecutamos una consulta SQL, para obtener los datos del libro con el 'id' proporcionado.
    $libro = new Libro();
    $datosLibro = $libro->where('id',$id)->first();

    //borrado de la carpeta upload
    //concatenamos la direccion donde esta la imagen, con la columna donde se encuentra la imagen en la tabla libros, de esta manera, elimina los datos de los dos lados.
    $ruta = ('../public/uploads/' . $datosLibro['imagen']);

    //eliminamos el archivo de imagen del libro utilizando la funcion unlink, que recibe como argumento la ruta del archivo a eliminar
    unlink($ruta);


    //buscamos el libro en la base de datos, proporcionando el id, y lo eliminamos con el metodo delete de la clase libro, pasandole el $id a eliminar
    $libro->where('id',$id)->delete($id);

    // retornamos una respuesta, donde redireccionamos a la URL /listar
    return $this->response->redirect(site_url('/listar'));
  }

  public function editar($id = null)
  {
    $libro = new Libro();

    $datos['libro'] = $libro->where('id',$id)->first();

    $datos['cabecera'] = view('template/cabecera');
    $datos['pie'] = view('template/piepagina');

    return view('libros/editar', $datos);
  }

  public function actualizar()
  {
    $libro = new Libro();

    //datos a modificar en la funcion actualizar.
    $datos = [
      'nombre' => $this->request->getVar('nombre'),
      'autor' => $this->request->getVar('autor'),
    ];
    
    //recepcion del id de la interfaz editar.
    $id = $this->request->getVar('id');

    //funcion de php, para la modificacion de los datos, por medio del id seleccionado
    $libro->update($id,$datos);

    return $this->response->redirect(site_url('/listar'));
  }
}
