<button>
    <a class="btn btn-sm styleButton" href="<?php echo base_url('gestionCategorias');?>">Volver</a>
</button>
<div class="container"> 
    <div class="">
        <div class="card-container estiloTarjeta row p-4 d-flex m-auto mt-4 justify-content-center col-lg-6 col-md-64">
        <!-- La siguiente linea de codigo recupera los datos que fueron validados -->
        <?php $validation = \Config\Services::validation(); ?>
            <form class="d-flex flex-column" action="<?php echo base_url('Admin_controller/altaCategoria') ?>" method="post" enctype="multipart/form-data"> <!-- Envia el formulario para hacer las validaciones -->
            <!-- Muestra el mensaje en caso de error -->
                <?php if (!empty(session()->getFlashdata('mensaje'))) : ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('mensaje'); ?></div>
                <?php endif ?>
                <!-- Aca va el formulario -->
                <h1 class="text-black">Cargar nueva categoria</h1>
                <!-- Campo nombre -->
                <div class="form-group">
                    <label class="text-black">Nombre categoria:</label>
                    <input class="form-control" type="text" name="categoria_descripcion" placeholder="Nombre">
                    <?php if ($validation->getError('categoria_descripcion')) { ?>
                        <div class='alert alert-danger'>
                            <?= $error = $validation->getError('categoria_descripcionbre'); ?>
                        </div>
                    <?php } ?>
                </div>
                <br></br>
                <button type="submit" class="btn styleButton">Enviar</button>
            </form>
        </div>
    </div>
</div>