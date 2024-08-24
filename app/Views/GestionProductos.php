<div class="container">
<!-- Formulario para filtrar por categoría -->
<div class="position-relative top-0 end-0">
    <div class="justify-content-center d-flex">
        <form action="<?php echo base_url('gestionProducto');?>" method="get">
            <select name="categoria" class="form-select" onchange="this.form.submit()">
                <option value="">Todas las categorías</option> <!-- Primer opcion: todas las categorias -->
                <!-- Recorro las categorias -->
                <?php foreach($categorias as $categoria) { ?> 
                    <option value="<?php echo $categoria['id_categoria']; ?>" <?php echo isset($_GET['categoria']) && $_GET['categoria'] == $categoria['id_categoria']? 'selected': '';?>>
                        <?php echo $categoria['categoria_descripcion']; ?> <!-- Imprime las categorias de la bdd-->
                    </option>
                <?php } ?>
            </select>
        </form>
    </div>
</div>
<div class="justify-content-center d-flex p-3 m-3">
    <a class="btn btn-success" href="<?php echo base_url('altaProducto');?>">Agregar producto</a> <!-- Abre formulario para agregar nuevo producto -->
</div>
    <!-- Tabla donde muestra todos los productos -->
    <div class="table table-responsive d-flex">
        <table class="table table-bordered table-striped table-hover table-dark table-sm border-white">
            <!-- Fila de la tabla -->
            <thead class="styleTittleTable">
                <!-- Cada seccion de la fila -->
                <th class="text-white">Nombre</th>
                <th class="text-white">Descripcion</th>
                <th class="text-white">Precio</th>
                <th class="text-white">Stock</th>
                <th class="text-white">Categoria</th>
                <th class="text-white">Imagen</th>
                <th class="text-white">Editar</th>
                <th class="text-white">Activar/Eliminar</th>
            </thead>
            <!-- Body de la tabla -->
            <tbody>
                <!-- Recorremos arreglo de productos enviado desde el controlador -->
            <?php foreach($productos as $row) {?>
            <tr class="fila">
                <!-- Cada seccion de la fila -->
                <td class="text-white"><?php echo $row['producto_nombre'];?></td>
                <td class="text-white"><?php echo $row['producto_descripcion'];?></td>
                <td class="text-white"><?php echo $row['producto_precio'];?></td>
                <td class="text-white"><?php echo $row['producto_stock'];?></td>
                <td class="text-white"><?php echo $row['categoria_descripcion'];?></td>
                <td class="text-white"><img src="<?php echo base_url('/assets/uploads/'.$row['producto_imagen']); ?>" height="100" width="100"></td>
                <td>
                    <a class="btn btn-success btn-sm" href="<?= site_url('Producto_controller/modificarProducto/' . $row['id_producto']) ?>">Editar</a>
                </td>
                <?php
                    if($row['producto_estado'] == 1){ ?> <!-- Si el producto esta activo -->
                    <td class="text-center">
                        <a class="btn btn-danger btn-sm" href="<?= site_url('Producto_controller/eliminarProducto/'. $row['id_producto'])?>">Eliminar</a> <!-- Me permite eliminarlo (inactivarlo)-->
                    </td>
                <?php }else{ ?> <!-- Si el producto esta inactivo -->
                    <td class="text-center"><a class="btn btn-success btn-sm" href="<?php echo base_url('Producto_controller/activarProducto/'.$row['id_producto']);?>">Activar</a></td> <!-- Me permite activarlo -->
                <?php } ?>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>