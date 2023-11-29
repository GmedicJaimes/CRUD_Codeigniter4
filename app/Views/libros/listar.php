<?= $cabecera ?>

//? link para ir a otra vista
//se usa dentro del href php, usando la funcion base_url, que se usa para obtener la url de mi sitio web, en este caso la usamos para apuntar a la rute 'crear'.
<a href="<?= base_url('crear') ?>">Crear un libro</a>

<table class="table table-light">
  <thead class="thead-light">
    <tr>
      <th>#</th>
      <th>Imagen</th>
      <th>Nombre</th>
      <th>Autor</th>
      <th>Acciones</th>

    </tr>
  </thead>
  <tbody>


    <?php foreach ($libros as $libro) { ?>

      <tr>
        <td><?= $libro['id'] ?></td>
        <td><?= $libro['imagen'] ?></td>
        <td><?= $libro['nombre'] ?></td>
        <td><?= $libro['autor'] ?></td>
        <td>Editar/

          <a href='<?= base_url('borrar/' . $libro['id']) ?>' class="btn btn-danger" type="button">Borrar</a>

        </td>
      </tr>

    <?php } ?>

  </tbody>
</table>

<?= $pie ?>