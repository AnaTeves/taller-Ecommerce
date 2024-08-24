<button>
    <a class="btn btn-sm styleButton" href="<?php echo base_url('listarVentas');?>">Volver</a>
</button>
    
    <h1 class="text-center text-white mt-4">Cliente</h1>
    <?php if ($factura): ?>
        <table border="1" class="table table-bordered table-striped table-hover table-dark table-sm border-white">
            <thead class="styleTittleTable">
                <tr>
                    <th class="text-black">Nombre</th>
                    <th class="text-black">Apellido</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($factura as $item): ?>
                    <tr>
                        <td class="text-white"><?php echo $item['nombre']; ?></td>
                        <td class="text-white"><?php echo $item['apellido']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No se encontró la factura.</p>
    <?php endif; ?>

    <h1 class="text-center text-white mt-4">Detalles del producto</h1>
    <?php if ($detalles): ?>
        <table border="1" class="table table-bordered table-striped table-hover table-dark table-sm border-white">
            <thead class="styleTittleTable">
                <tr>
                    <th class="text-black">Producto</th>
                    <th class="text-black">Cantidad</th>
                    <th class="text-black">Precio</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($detalles as $detalle): ?>
                    <tr>
                        <td class="text-white"><?php echo $detalle['producto_nombre']; ?></td>
                        <td class="text-white"><?php echo $detalle['detalle_cantidad']; ?></td>
                        <td class="text-white"><?php echo $detalle['producto_precio']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No se encontraron detalles para esta venta.</p>
    <?php endif; ?>
