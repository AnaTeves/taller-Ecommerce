<!--VISTA DE COMPRAS REALIZADAS (FACTURA)-->
<a class="btn m-3 styleButton" href="<?php echo base_url('verCarrito')?>">Volver</a>
<div class="container">
<h1 class="text-white row p-3 d-flex m-auto justify-content-center">Historial de compras</h1>
    <div class="row d-flex flex-row text-center justify-content-center">
        <?php foreach($purchases as $purchase) {?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="card styleCompras">
                    <div class="text-black fw-bold">
                        Detalle de la compra
                    </div><hr>
                    <div class="card-body p-0">
                        <h5 class="card-title text-muted">Compra: #<?= $purchase['id_venta'] ?></h5>
                        <h5 class="card-title text-muted">Nombre: <?= $purchase['nombre'] ?></h5>
                        <h5 class="card-title text-muted">Apellido: <?= $purchase['apellido'] ?></h5>
                        <h5 class="card-title text-muted">Email: <?= $purchase['email'] ?></h5>
                        <h5 class="card-title text-muted">Total de la compra: $<?= $purchase['total_venta'] ?></h5>
                    </div><hr>
                    <div class="card-footer text-black">
                        Fecha: <?= $purchase['fecha_venta'] ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>




