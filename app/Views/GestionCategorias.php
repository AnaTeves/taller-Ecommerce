<div class="container">
    <h1 class="text-center text-white m-3">Listado de categorias</h1>
</div>
<div class="justify-content-center d-flex botton">
    <a class="btn btn-success" href="<?php echo base_url('altaCategoria');?>">Añadir</a> <!-- Abre formulario para añadir nueva categoria -->
</div>
    <!-- Tabla donde muestra todas las categorias -->
    <div class="table table-responsive styleTable d-flex">
        <table class="table table-bordered table-striped table-hover table-dark table-sm border-white">
            <!-- Fila de la tabla -->
            <thead class="styleTittleTable">
                <!-- Cada seccion de la fila -->
                <th class="text-black">Categoria</th>
                <th class="text-black">Activar/Eliminar</th>
            </thead>
            <!-- Body de la tabla -->
            <tbody>
                <!-- Recorremos arreglo de categorias enviado desde el controlador -->
            <?php foreach($categorias as $row) {?>
            <tr class="fila">
                <!-- Cada seccion de la fila -->
                <td class="text-white"><?php echo $row['categoria_descripcion'];?></td>
                
                <?php
                    if($row['categoria_estado'] == 1){ ?> <!-- Si el producto esta activo -->
                    <td class="text-center">
                        <a class="btn btn-danger btn-sm" href="<?= site_url('Admin_controller/eliminarCategoria/'. $row['id_categoria'])?>">Eliminar</a> <!-- Me permite eliminarlo (inactivarlo)-->
                    </td>
                <?php }else{ ?> <!-- Si el producto esta inactivo -->
                    <td class="text-center"><a class="btn btn-success btn-sm" href="<?php echo base_url('Admin_controller/activarCategoria/'. $row['id_categoria']);?>">Activar</a></td> <!-- Me permite activarlo -->
                <?php } ?>
            </tr>
            <?php } ?>
            </tbody>
        </table>
</div>

