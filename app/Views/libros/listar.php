<?= $cabecera ?>
<!-- {
  //? link para ir a otra vista
  //dentro del href se usa php, usando la funcion base_url, que se usa para obtener la url de mi sitio web, en este caso la usamos para apuntar a la ruta 'crear'.
} -->
<a href="<?= base_url('crear') ?>">Crear un libro</a>

<table class="table table-light border ">
  <thead class="thead-light text-center">
    <tr>
      <th>#</th>
      <th>Imagen</th>
      <th>Nombre</th>
      <th>Autor</th>
      <th>Acciones</th>

    </tr>
  </thead>
  <tbody class="text-center">


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