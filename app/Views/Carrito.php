<!-- CARRITO DE COMPRAS -->
<?php if (empty($carrito)) { ?> <!-- Si esta vacio -->
    <div class="ancho-form mx-auto m-5">
        <div class="alert d-flex align-items-center d-flex flex-column" role="alert"> <!-- Emite mensaje de alerta -->
        <h3 class="p-3 text-white">Carrito vacío</h3>
        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-cart-x icono-color" viewBox="0 0 16 16">
            <path d="M7.354 5.646a.5.5 0 1 0-.708.708L7.793 7.5 6.646 8.646a.5.5 0 1 0 .708.708L8.5 8.207l1.146 1.147a.5.5 0 0 0 .708-.708L9.207 7.5l1.147-1.146a.5.5 0 0 0-.708-.708L8.5 6.793z"/>
            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
        </svg> <br>
        <a class="btn btn-success styleButton" href="<?php echo base_url('catalogo')?>">Seleccionar productos</a>    
        <a class="btn btn-success mt-3 styleButton" href="<?php echo base_url('verCompras')?>">Ver historial de compras</a>    
        </div>
    </div>
<?php } else {?>
<!-- Titulo de bienvenida -->
<h1 class="m-0 text-center">Carrito de <?php echo session('nombre')?></h1>
<!-- Tabla con los productos -->
<div class="container mt-2 table-responsive">
    <table class="table table-striped table-hover">
        <!-- Encabezado -->
        <thead class="styleTittleTable">
            <th class="text-black">Item</th>
            <th class="text-black">Nombre</th>
            <th class="text-black">Precio</th>
            <th class="text-black">Cantidad</th>
            <th class="text-black">Quitar</th>
        </thead>
        <!-- Body de la tabla -->
        <tbody>
        <?php 
        $total = 0;
        $i = 1;
        // Recorremos el arreglo de carrito
        foreach($carrito as $row) {?>
        <tr>
            <td class="text-black"><?php echo $i++ ;?></td>
            <td class="text-black"><?php echo $row['name'];?></td>
            <td class="text-black"><?php echo $row['price'];?></td>
            <td class="text-black"><?php echo $row['qty'];?></td>
            <?php $total += $row['price'] * $row['qty']; ?>    
            <td class="text-black">
                <a href="<?php echo base_url('Carrito_controller/eliminarProducto/'.$row['id']); ?>" class="btn btn-danger btn-sm">Eliminar</a>
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>

    <h1 class="text-white textCarrito">Total de la compra: $<?php echo $total ?></h1> <!-- Muestra total de la compra -->
    <h1 class="text-white textCarrito">Total de articulos: <?php echo $totalProductos ?></h1>  <!-- Muestra cantidad de productos -->
</div>
<!-- Botones para realizar operaciones con respecto al carrito -->
<div class="container">
        <div class="row">
            <div class="col-md-3">
            <!-- Permite seleccionar mas productos -->
            <a class="btn btn-success w-100 mt-2 h-75 pb-3 styleButton" href="<?php echo base_url('catalogo')?>">Volver al catalogo</a>    
            </div>
            <div class="col-md-3">
            <!-- Finaliza la compra y descuenta de stock -->
            <a class="btn btn-success w-100 mt-2 h-75 pb-3 styleButton" href="<?php echo base_url('Carrito_controller/terminarCompra')?>">Finalizar compra</a>
            </div>
            <div class="col-md-3">
            <!-- Vacia el carrito -->
            <a class="btn btn-success w-100 mt-2 h-75 pb-3 styleButton" href="<?php echo base_url('Carrito_controller/vaciarCarrito')?>">Vaciar Carrito</a>
            </div>
            <div class="col-md-3">
            <!-- Muestra historial de compras realizadas -->
            <a class="btn btn-success w-100 mt-2 h-75 pb-3 styleButton" href="<?php echo base_url('verCompras')?>">Ver historial de compras</a>
            </div>
        </div>
    </div>
<?php } ?>