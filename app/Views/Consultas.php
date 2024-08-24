<!-- Filtro para consultas -->
<div class="container">

    <div class="position-relative top-0 end-0 m-3">
        <h1 style="Font-size:20px;">Filtrar por:</h1>
        <div class="justify-content-center d-flex">
            <form method="GET" action="<?php echo base_url('Contacto_controller/verConsultas');?>">
                <select name="estado" class="form-select" onchange="this.form.submit()">
                    <option value="">Todas las consultas</option>
                    <option value="respondido" <?php echo (isset($_GET['estado']) && $_GET['estado'] == 'respondido') ? 'selected' : ''; ?>>Respondido</option>
                    <option value="no_respondido" <?php echo (isset($_GET['estado']) && $_GET['estado'] == 'no_respondido') ? 'selected' : ''; ?>>No respondido</option>
                </select>
            </form>
        </div>
    </div>

<!-- Muestra un listado con todas las consultas almacenadas en la base de datos -->
<h1 class="text-center text-white mt-4">Listado de consultas realizadas por usuarios no registrados</h1>
<div class="table table-responsive styleTable d-flex">
    <table class="table table-bordered table-striped table-hover table-dark table-sm border-white">
        <!-- Definimos un bloque con celdas -->
        <thead class="styleTittleTable">
            <!-- Columnas de la tabla -->
            <th class="text-white">Nombre</th>
            <th class="text-white">Email</th>
            <th class="text-white">Asunto</th>
            <th class="text-white">Mensaje</th>
            <th class="text-white">Estado</th>
        </thead>
        <!-- Definimos el cuerpo de nuestra tabla mediante la etiqueta tbody -->
        <tbody>
            <!-- Recorremos el array de consultas almacenadas en la base de datos -->
        <?php foreach($consultas as $row) {?>

            <!-- Definimos la fila de cada tabla -->
        <tr>
            <!-- Define cada celda de la tabla -->
            <td class="text-white"><?php echo $row['nombre'];?></td>
            <td class="text-white"><a href="mailto:correo@example.com"><?php echo $row['correo'];?></a></td>

            <td class="text-white"><?php echo $row['asunto'];?></td>
            <td class="text-white"><?php echo $row['consulta'];?></td>

            <?php
                if($row['leido']==1){ ?>
                <td>
                    <a class="btn btn-success btn-sm" href="<?php echo base_url('Contacto_controller/desactivarLeidoConsulta/'.$row['id']);?>">Respondido</a>
                </td>
                <?php } else{ ?>
                <td>
                    <a class="btn btn-danger btn-sm" href="<?php echo base_url('Contacto_controller/activarLeidoConsulta/'.$row['id']);?>">No respondido</a>
                </td>
                <?php   } ?>
        </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<!-- Muestra un listado con todas las consultas almacenadas en la base de datos -->
<h1 class="text-center text-white mt-4">Listado de consultas realizadas por usuarios registrados</h1>
<div class="table table-responsive styleTable d-flex">
    <table class="table table-bordered table-striped table-hover table-dark table-sm border-white">
        <!-- Definimos un bloque con celdas -->
        <thead class="styleTittleTable">
            <!-- Columnas de la tabla -->
            <th class="text-white">Nombre</th>
            <th class="text-white">Email</th>
            <th class="text-white">Asunto</th>
            <th class="text-white">Mensaje</th>
            <th class="text-white">Estado</th>
        </thead>
        <!-- Definimos el cuerpo de nuestra tabla mediante la etiqueta tbody -->
        <tbody>
            <!-- Recorremos el array de consultas almacenadas en la base de datos -->
        <?php foreach($contacto as $row) {?>

            <!-- Definimos la fila de cada tabla -->
        <tr>
            <!-- Define cada celda de la tabla -->
            <td class="text-white"><?php echo $row['nombre'];?></td>
            <td class="text-white"><a href="mailto:<?php echo $row['correo'];?>"><?php echo $row['correo'];?></a></td>
            <td class="text-white"><?php echo $row['asunto'];?></td>
            <td class="text-white"><?php echo $row['consulta'];?></td>

            <?php
                if($row['leido']==1){ ?>
                <td>
                    <a class="btn btn-success btn-sm" href="<?php echo base_url('Contacto_controller/desactivarLeidoContacto/'.$row['id']);?>">Respondido</a>
                </td>
                <?php }else{ ?>
                <td><a class="btn btn-danger btn-sm" href="<?php echo base_url('Contacto_controller/activarLeidoContacto/'.$row['id']);?>">No respondido</a></td>
                <?php } ?>
        </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</div>