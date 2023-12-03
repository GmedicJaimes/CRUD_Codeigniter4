<?= $cabecera ?>
<h2 class=" text-primary">Editar libros</h2>

<div class="card">
  <div class="card-body">
    <h5 class="card-title">Datos a modificar</h5>
    <p class="card-text">
      
      <form method="post" action="<?= site_url('/actualizar') ?>" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?=$libro['id']?>" >
        
        <div class="form-group">
          <label for="nombre">Nombre: </label>
          <input id="nombre" value="<?=$libro['nombre']?>" class="form-control" type="text" name="nombre">
        </div>
        <div class="form-group">
          <label for="autor">Autor: </label>
          <input id="autor" value="<?=$libro['autor']?>"  class="form-control" type="text" name="autor">
        </div>
        <div class="form-group">
          <label for="imagen">Imagen: </label>
          <br/>
          <img class="img-thumbnail" src="<?= base_url()?>/uploads/<?= $libro['imagen']; ?>" width="150" alt="">
          <input id="imagen" class="form-control-file" type="file" name="imagen">
        </div>
        
        <button class="btn btn-info" type="submit">Editar</button>
      </form>
    </p>
  </div>
</div>
<a href="<?= base_url('listar')?>"> Back</a>
<?= $pie ?>