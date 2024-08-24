<!-- Muestra una lista de todos los productos -->
<div class="container">
<h1 class="text-center text-white m-3">Listado de usuarios</h1>

     <!-- Tabla donde muestra todos los usuarios -->
    <div class="styleTable table-responsive table d-flex">
        <table class="table table-bordered table-striped table-hover table-dark table-sm border-white">
            <!-- Fila de la tabla -->
            <thead class="styleTittleTable">
                <!-- Cada seccion de la fila -->
                <th class="text-white">Nombre</th>
                <th class="text-white">Apellido</th>
                <th class="text-white">Email</th>
                <th class="text-white">Activar/Eliminar</th>
            </thead>
            <!-- Body de la tabla -->
            <tbody>
                <!-- Recorremos arreglo de productos enviado desde el controlador -->
            <?php foreach($usuarios as $row) {?>
            <tr class="fila">
                <!-- Cada seccion de la fila -->
                <td class="text-white"><?php echo $row['nombre'];?></td>
                <td class="text-white"><?php echo $row['apellido'];?></td>
                <td class="text-white"><?php echo $row['email'];?></td>
        
                <?php
                    if($row['baja'] == 1){ ?> <!-- Si el producto esta activo -->
                    <td class="text-center">
                        <a class="btn btn-danger btn-sm" href="<?= site_url('Admin_controller/eliminarUsuario/'. $row['id_usuario'])?>">Eliminar</a> <!-- Me permite eliminarlo (inactivarlo)-->
                    </td>
                <?php }else{ ?> <!-- Si el producto esta inactivo -->
                    <td class="text-center"><a class="btn btn-success btn-sm" href="<?php echo base_url('Admin_controller/activarUsuario/'.$row['id_usuario']);?>">Activar</a></td> <!-- Me permite activarlo -->
                <?php } ?>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>