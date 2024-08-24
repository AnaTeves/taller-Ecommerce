<h1 class="text-center text-white mt-4">Listado de ventas realizadas</h1>

<div class="table-responsive table d-flex">
    <table class="table table-striped table-hover table-dark table-sm table-bordered border-white">
        <thead class="styleTittleTable">
            <th class="text-black">ID Compra</th>
            <th class="text-black">ID Cliente</th>
            <th class="text-black">Fecha</th>
            <th class="text-black">Monto total</th>
            <th class="text-black">Detalle</th> <!--MOSTRAR LOS PRODUCTOS QUE COMPRO CADA CLIENTE-->
        </thead>
        
        <tbody>
        <?php foreach($purchases as $purchase) {?>
        <tr>
            <td class="text-white"><?php echo $purchase['id_venta'];?></td>
            <td class="text-white"><?php echo $purchase['id_usuario'];?></td>
            <td class="text-white"><?php echo $purchase['fecha_venta'];?></td>
            <td class="text-white"><?php echo $purchase['total_venta'];?></td>
            <td class="p-0" ><a class="btn btn-sm styleButton" href="<?php echo base_url('detalleVenta/'.$purchase['id_venta']);?>">Mostrar detalle</a></td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

