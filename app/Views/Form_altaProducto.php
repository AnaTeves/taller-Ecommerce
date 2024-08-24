<div class="container"> 
    <div class="row p-4 d-flex m-auto justify-content-center">
        <div class="col-md-7">
            <div class="card-container row">
            <!-- La siguiente linea de codigo recupera los datos que fueron validados -->
            <?php $validation = \Config\Services::validation(); ?>
                <form class="d-flex flex-column" style="width:400px" action="<?php echo base_url('Producto_controller/agregar') ?>" method="post" enctype="multipart/form-data"> <!-- Envia el formulario para hacer las validaciones -->
                <!-- Muestra el mensaje en caso de error -->
                    <?php if (!empty(session()->getFlashdata('mensaje'))) : ?>
                        <div class="alert alert-success"><?= session()->getFlashdata('mensaje'); ?></div>
                    <?php endif ?>
                    <!-- Aca va el formulario -->
                    <h1 class="text-black">Nuevo producto</h1>
                    <!-- Campo nombre -->
                    <div class="form-group">
                        <label>Nombre</label>
                        <input class="form-control" type="text" name="nombre" placeholder="Nombre">
                        <?php if ($validation->getError('nombre')) { ?>
                            <div class='alert alert-danger'>
                                <?= $error = $validation->getError('nombre'); ?>
                            </div>
                        <?php } ?>
                    </div>
                    <!-- Campo descripcion -->
                    <div class="form-group">
                        <label>Descripcion</label>
                        <input class="form-control" type="text" name="descripcion" placeholder="Descripcion">
                        <?php if ($validation->getError('descripcion')) { ?>
                            <div class='alert alert-danger'>
                                <?= $error = $validation->getError('descripcion'); ?>
                            </div>
                        <?php } ?>
                    </div>
                    <!-- Campo precio -->
                    <div class="form-group">
                        <label>Precio</label>
                        <input class="form-control" type="text" name="precio" placeholder="Precio">
                        <?php if ($validation->getError('precio')) { ?>
                            <div class='alert alert-danger'>
                                <?= $error = $validation->getError('precio'); ?>
                            </div>
                        <?php } ?>
                    </div>
                    <!-- Campo stock -->
                    <div class="form-group">
                        <label>Stock</label>
                        <input class="form-control" type="number" name="stock" placeholder="Ingrese cantidad de productos">
                        <?php if ($validation->getError('stock')) { ?>
                            <div class='alert alert-danger'>
                                <?= $error = $validation->getError('stock'); ?>
                            </div>
                        <?php } ?>
                    </div>
                    <!-- Campo imagen -->
                    <div class="form-group">
                        <label>Imagen</label>
                        <input class="form-control" type="file" name="producto_imagen" size="20">
                        <?php if ($validation->getError('producto_imagen')) { ?>
                            <div class='alert alert-danger'>
                                <?= $error = $validation->getError('producto_imagen'); ?>
                            </div>
                        <?php } ?>
                    </div>
                    <!--CATEGORIAS-->
                    <div class="form-label fs-5 fw-bold text-white">
                        <label class="form-label" for="producto_categoria" name="producto_categoria">Categorias</label>
                        <?php 
            
                        $lista['0'] = 'Seleccione categoria';
                        
                        foreach($categorias as $rows){
                            $categoria_id = $rows['id_categoria'];
                            $categoria_desc = $rows['categoria_descripcion'];
                            $lista[$categoria_id] = $categoria_desc;
                        }
                        echo form_dropdown('producto_categoria', $lista, '0', 'class="form-control"');
                        ?>
                    </div>
                    <br></br>
                    <button type="submit" class="btn btn-primary styleButton">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>