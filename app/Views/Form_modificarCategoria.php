<div class="container"> 
    <div class="row gap-4 p-4 d-flex m-auto justify-content-center w-100">
        <div class="col card-container estiloTarjeta">
        <?php $validation = \Config\Services::validation(); ?>
        <form class="d-flex flex-column" action="<?php echo base_url('Admin_controller/actualizarCategoria/'. $categoria['id_categoria']) ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <!-- Formulario para modificar una categoria -->
            <h1 class="text-black">Modificar categoria</h1>
            <!-- Campo nombre -->
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="descripcion" class="form-control" placeholder="Nombre" value="<?php echo $categoria['categoria_descripcion'] ?>">
                <?php if($validation && $validation->hasError('descripcion')): ?>
                    <div class="text-danger"><?= $validation->getError('descripcion'); ?></div>
                <?php endif; ?>
            </div>
            <br></br>
            <!-- Boton actualizar -->
            <button type="submit" class="btn btn-primary styleButton">Actualizar</button>
        </form>
        </div>
    </div>
</div>