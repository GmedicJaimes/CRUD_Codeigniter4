<?= $cabecera ?>
<h2 class="text-center text-primary">Formulario para crear libro</h2>
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Ingresar datos del libro</h5>
    <p class="card-text">
      
      <form method="post" action="<?= site_url('/guardar') ?>" enctype="multipart/form-data">
        <div class="form-group">
          <label for="nombre">Nombre: </label>
          <input id="nombre" class="form-control" type="text" name="nombre">
        </div>
        <div class="form-group">
          <label for="autor">Autor: </label>
          <input id="autor" class="form-control" type="text" name="autor">
        </div>
        <div class="form-group">
          <label for="imagen">Imagen: </label>
          <input id="imagen" class="form-control-file" type="file" name="imagen">
        </div>
        <button class="btn btn-success" type="submit">Guardar</button>
      </form>
    </p>
  </div>
</div>
<a href="<?= base_url('listar')?>"> Back</a>






<?= $pie ?>