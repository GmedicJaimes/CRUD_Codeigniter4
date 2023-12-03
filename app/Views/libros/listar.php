<?= $cabecera ?>
<!-- {
  //? link para ir a otra vista
  //dentro del href se usa php, usando la funcion base_url, que se usa para obtener la url de mi sitio web, en este caso la usamos para apuntar a la ruta 'crear'.
} -->
<a href="<?= base_url('crear') ?>" class="btn btn-success">Crear un libro</a>
<br/>
<br/>
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
        <td>
          <img class="img-thumbnail" src="<?= base_url()?>/uploads/<?= $libro['imagen']; ?>" width="150" alt="">
        
        </td>
        <td><?= $libro['nombre'] ?></td>
        <td><?= $libro['autor'] ?></td>
        <td>
          <a href='<?= base_url('editar/' . $libro['id']) ?>' class="btn btn-info" type="button">Editar</a>

          /

          <a href='<?= base_url('borrar/' . $libro['id']) ?>' class="btn btn-danger" type="button">Borrar</a>

        </td>
      </tr>

    <?php } ?>

  </tbody>
</table>

<?= $pie ?>