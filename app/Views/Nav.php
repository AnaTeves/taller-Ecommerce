<div class="container">
  <div class="row align-items-center m-0">
    <div class="col-12 col-xxl-3 col-xl-3 col-lg-3 p-0 d-flex flex-row justify-content-center text-align-center column">
      <a href="http://localhost/proyecto_Lu_Teves/" class="p-1"><img src="<?php echo base_url('assets/img/logoblanco.png') ?>" alt="Logo" class="p-0 d-inline-block" style="whidth:130px; height:130px;"></a>
    </div>  
    <div class="col-12 col-xxl-3 col-xl-3 col-lg-3 col-sm-12 col-md-12 d-flex flex-row text-align-center justify-content-center column">
      <!-- Formulario de busqueda que envio al controlador de productos -->
      <form class="form-inline my-2 my-lg-0" method="get" action="<?php echo base_url('buscarProductos');?>">
        <input class="form-control mr-sm-2" name="query" type="search" placeholder="Buscar" aria-label="Buscar">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="bi bi-search"></i></button>
      </form>
    </div>
      <!-- CONDICIONAL DE LA SESION -->
    <?php if(session('login')){ ?>
      <div class="col-6 col-xxl-3 col-xl-3 col-sm-6 col-md-6 xs-6">
        <!-- Carrito de compras -->
        <div class="m-0 p-0">
          <a class="text-white text-decoration-none" href="<?php echo base_url('verCarrito');?>"><i class="bi bi-cart3 bi-5x"></i></a>
        </div>
      </div>
      <div class="col-6 col-xxl-3 col-xl-3 col-sm-6 col-md-6 xs-6">
        <!-- Cerrar la sesion -->
        <div class="m-0 p-0">
          <a class="text-white text-decoration-none" href="<?php echo base_url('logout');?>">Salir</a>
        </div>
      </div>
    <?php } else { ?>
      <div class="col-6 col-xxl-3 col-xl-3 col-lg-3 col-sm-6 col-md-6">
        <!-- Carrito de compras -->
        <div class="m-0 p-0">
          <a class="text-white text-decoration-none" href="<?php echo base_url('verCarrito');?>"><i class="bi bi-cart3 bi-5x"></i></a>
        </div>
      </div>
      <div class="col-6 col-xxl-3 col-xl-3 col-lg-3 col-sm-6 col-md-6">
        <!-- Inicio de sesion --> 
        <div class="m-0 p-0">
          <a class="text-white text-decoration-none" href="<?php echo base_url('ingreso');?>">Iniciar sesion</a>
        </div>
      </div>
    <?php } ?>              
  </div>
  <div class="row justify-content-center subbarra">
      <!--Condicional del login-->
      <?php if(session('id_perfil') == 1){ ?>
      <div class="limite d-flex justify-content-center">
        <div class="m-0 p-0">
          <a class="text-white text-decoration-none btn-style btn" href="<?php echo base_url('catalogo');?>">Productos</a>
        </div>
        <div class="m-0 p-0">
          <a class="text-white text-decoration-none btn-style btn" href="<?php echo base_url('verConsultas');?>">Consultas</a>
        </div>
        <div class="m-0 p-0">
          <a class="text-white text-decoration-none btn-style btn" href="<?php echo base_url('gestionProducto');?>">Gestion productos</a>
        </div>
        <div class="m-0 p-0">
          <a class="text-white text-decoration-none btn-style btn" href="<?php echo base_url('gestionCategorias');?>">Gestion categorias</a>
        </div>
        <div class="m-0 p-0">
          <a class="text-white text-decoration-none btn-style btn" href="<?php echo base_url('gestionUsuarios');?>">Gestion usuarios</a>
        </div>
        <div class="m-0 p-0">
          <a class="text-white text-decoration-none btn-style btn" href="<?php echo base_url('listarVentas');?>">Ventas</a>
        </div>
      </div>
      <?php } else { ?>
      <div class="limite d-flex justify-content-center">
        <div class="m-0 p-0">
          <a class="text-white text-decoration-none btn-style btn" href="<?php echo base_url('quienesSomos');?>">Nosotros</a>
        </div>
        <div class="m-0 p-0">
          <a class="text-white text-decoration-none btn-style btn" href="<?php echo base_url('catalogo');?>">Productos</a>
        </div>
        <div class="m-0 p-0">
          <a class="text-white text-decoration-none btn-style btn" href="<?php echo base_url('contacto');?>">Contacto</a>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</div>