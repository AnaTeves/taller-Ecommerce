<div class="container"> 
    <div class="">
        <div class="card-container estiloTarjeta row p-4 d-flex m-auto mt-4 justify-content-center col-lg-6 col-md-6">
        <?php $validation = \Config\Services::validation(); ?>
        <form class="d-flex flex-column" action="<?php echo base_url('Producto_controller/actualizarProducto/'.$producto['id_producto']); ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <!-- Formulario para modificar producto -->
            <h1 class="text-white">Modificar Producto</h1>
            <!-- Campo nombre -->
            <div class="form-group">
                <label for="nombre" class="text-white">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="<?php echo set_value('nombre', $producto['producto_nombre']); ?>">
                <?php if($validation && $validation->hasError('nombre')): ?>
                    <div class="text-danger"><?= $validation->getError('nombre'); ?></div>
                <?php endif; ?>
            </div>
            <!-- Campo descripcion -->
            <div class="form-group">
                <label for="descripcion" class="text-white">Descripción</label>
                <textarea name="descripcion" class="form-control"><?php echo set_value('descripcion', $producto['producto_descripcion']); ?></textarea>
                <?php if($validation && $validation->hasError('descripcion')): ?>
                    <div class="text-danger"><?= $validation->getError('descripcion'); ?></div>
                <?php endif; ?>
            </div>
            <!-- Campo precio -->
            <div class="form-group">
                <label for="precio" class="text-white">Precio</label>
                <input type="text" name="precio" class="form-control" value="<?php echo set_value('precio', $producto['producto_precio']); ?>">
                <?php if($validation && $validation->hasError('precio')): ?>
                    <div class="text-danger"><?= $validation->getError('precio'); ?></div>
                <?php endif; ?>
            </div>
            <!-- Campo stock -->
            <div class="form-group">
                <label for="stock" class="text-white">Stock</label>
                <input type="text" name="stock" class="form-control" value="<?php echo set_value('stock', $producto['producto_stock']); ?>">
                <?php if($validation && $validation->hasError('stock')): ?>
                    <div class="text-danger"><?= $validation->getError('stock'); ?></div>
                <?php endif; ?>
            </div>
            <!-- Campo categoria -->
            <div class="form-group">
                <label for="producto_categoria" class="text-white">Categoría</label>
                <select name="producto_categoria" class="form-control">
                    <?php foreach($categorias as $categoria): ?>
                        <option value="<?= $categoria['id_categoria']; ?>" <?= $categoria['id_categoria'] == $producto['producto_categoria'] ? 'selected' : '' ?>><?= $categoria['categoria_descripcion']; ?></option>
                    <?php endforeach; ?>
                </select>
                <?php if($validation && $validation->hasError('producto_categoria')): ?>
                    <div class="text-danger"><?= $validation->getError('producto_categoria'); ?></div>
                <?php endif; ?>
            </div>
            <!-- Campo imagen -->
            <div class="form-group">
                <label for="producto_imagen" class="text-white">Imagen</label>
                <input type="file" name="producto_imagen" class="form-control">
                <img src="<?php echo base_url('/assets/uploads/'.$producto['producto_imagen']); ?>" height="100" width="100">
                <?php if($validation && $validation->hasError('producto_imagen')): ?>
                    <div class="text-danger"><?= $validation->getError('producto_imagen'); ?></div>
                <?php endif; ?>
            </div>
            <br></br>
            <!-- Boton actualizar -->
            <button type="submit" class="btn btn-primary styleButton">Actualizar</button>
        </form>
        </div>
    </div>
</div>
