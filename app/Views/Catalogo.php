<div class="container">
    <!-- Imagen superior que se modifica con el script -->
    <div class="row justify-content-center align-items-center text-center">
        <img id="categoriaImagen" src="<?php echo base_url('assets/img/categoriasfoto2.jpeg')?>" alt="Logo" class="configImg p-0">
    </div>
    <!-- Recupero las opciones seleccionadas con el método GET y las envío a la ruta catalogo -->
    <form method="GET" action="<?php echo base_url('catalogo');?>">
        <div class="row m-0">
            <div class="col"></div>
            <!-- Permite filtrar productos por categorías -->
            <div class="col filtro">
                <select id="categoriaSelect" name="categoria" class="form-select d-flex" onchange="this.form.submit(); cambiarImagen();">
                <option value="">Todas las categorías</option>
                <?php foreach ($categorias as $categoria): ?>
                    <option value="<?php echo $categoria['id_categoria']; ?>" <?php echo (isset($_GET['categoria']) && $_GET['categoria'] == $categoria['id_categoria']) ? 'selected' : ''; ?>>
                    <?php echo $categoria['categoria_descripcion']; ?>
                    </option>
                <?php endforeach; ?>
                </select>
            </div>
            <!-- Permite filtrar productos por precio ascendente o descendente -->
            <div class="col filtro">
                <select name="orden_precio" class="form-select d-flex" onchange="this.form.submit()">
                    <option value="">Ordenar por</option>
                    <option value="asc" <?php echo (isset($_GET['orden_precio']) && $_GET['orden_precio'] == 'asc') ? 'selected' : ''; ?>>Menor precio</option>
                    <option value="desc" <?php echo (isset($_GET['orden_precio']) && $_GET['orden_precio'] == 'desc') ? 'selected' : ''; ?>>Mayor precio</option>
                </select>
            </div>
            <div class="col"></div>
        </div>
    </form>
    <!-- Recorre y muestra los productos según el array recibido del controlador -->
    <div class="row m-0 p-0">
        <?php foreach($productos as $row): ?> <!-- Recorro los productos para imprimir las tarjetas -->
            <?php $imagen = base_url('assets/uploads/'.$row['producto_imagen']); ?>
            <?php if(($row['producto_stock'] > 0) && ($row['producto_estado'] == 1)): ?> <!-- Si el producto tiene stock y esta activo -->
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 styleCardExt">
                    <div class="card h-100">
                        <div class="card-body cardStyle text-center">
                            <img src="<?php echo $imagen ?>" class="card-img-top img-fluid config-img">
                            <h1 class="text-black card-title m-0"><?php echo $row['producto_nombre'];?></h1>
                            <h2 class="text-black m-0"><?php echo $row['producto_descripcion'];?></h2>
                            <h2 class="text-black">$<?php echo $row['producto_precio'];?></h2>
                            
                                <?php echo form_open('Carrito_controller/agregarCarrito'); ?>
                                <input type="hidden" name="id" value="<?php echo $row['id_producto']; ?>">
                                <input type="hidden" name="nombre" value="<?php echo $row['producto_nombre']; ?>">
                                <input type="hidden" name="precio" value="<?php echo $row['producto_precio']; ?>">
                                <button type="submit" class="btn btn-success">Agregar al carrito</button>
                                <?php echo form_close(); ?>
                            
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <!-- Enlaces de paginación -->
    <div class="d-flex justify-content-center pagination">
        <?php echo $pager->links('productos', 'custom_pagination'); ?>
    </div>
    <!-- Script que maneja el cambio de imagen segun la categoria seleccionada -->
    <script>
        function cambiarImagen() {
            var select = document.getElementById('categoriaSelect');
            var imagen = document.getElementById('categoriaImagen');
            var categoriaId = select.value;
            // Muestra las imagenes segun el id seleccionado
            var imagenes = {
                '2': '<?php echo base_url('assets/img/auricularescatalogo.png'); ?>',
                '3': '<?php echo base_url('assets/img/sillascatalogo.png'); ?>',
                '10': '<?php echo base_url('assets/img/parlantescatalogo.png'); ?>',
                '11': '<?php echo base_url('assets/img/accesorioscatalogo.png'); ?>',
                '12': '<?php echo base_url('assets/img/mousescatalogo.png'); ?>',
                '13': '<?php echo base_url('assets/img/tecladoscatalogo.png'); ?>',
                '14': '<?php echo base_url('assets/img/consolascatalogo.png'); ?>',
            };
            // Si tiene asociado un id, modifico el src
            if (imagenes[categoriaId]) {
                imagen.src = imagenes[categoriaId];
            } else { // Si no, utilizo uno por defecto
                imagen.src = '<?php echo base_url('assets/img/categoriasfoto2.jpeg'); ?>';
            }
        }
        // Cambiar imagen al cargar la página si hay una categoría seleccionada
        document.addEventListener("DOMContentLoaded", function() {
            var select = document.getElementById('categoriaSelect');
            var categoriaId = select.value;
            if (categoriaId) {
                cambiarImagen();
            }
        });
    </script>
</div>
