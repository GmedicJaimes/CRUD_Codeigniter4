<?php

namespace App\Controllers;

class Home extends BaseController
{
  public function index(): string
  {
    return view('Views/welcome_message.php');
  }

  public function libros(): string
  {
    return view('libros/listar.php');
  }
}
