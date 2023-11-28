<?= $cabecera ?>

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