    <!-- CARROUSEL -->
<div class="container">
  <div id="carouselExample" class="carousel slide d-flex">
    <div class="carousel-inner"> <!-- define cómo se organizan y muestran estos elementos dentro del carrusel -->
        <!-- Primer imagen -->
      <div class="carousel-item active">
          <img src="<?php echo base_url('assets/img/1carrouselPrincipal.jpg');?>" class="img-fluid d-block mx-auto" alt="Primer imagen">
      </div>
        <!-- Segunda imagen -->
      <div class="carousel-item">
        <img src="<?php echo base_url('assets/img/imagenNueva7.jpeg');?>" class="img-fluid d-block mx-auto" alt="Segunda imagen">
      </div>
        <!-- Tercer imagen -->
      <div class="carousel-item">
        <img src="<?php echo base_url('assets/img/imagenNueva5.jpeg');?>" class="img-fluid d-block mx-auto" alt="Tercer imagen">
      </div>
    </div>
      <!-- Boton de imagen previa -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Anterior</span>
    </button>
      <!-- Boton de imagen siguiente -->
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Siguiente</span>
    </button>
  </div>
</div>

  <div class="container stylesPrincipal">
  <h1>Ultimas novedades</h1><hr>
  <!-- Tarjetas Mas Vendidos -->
  <div class="row m-0 p-0">
    <!-- CARD 1 -->
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 styleCardExt">
      <div class="card">
        <div class="card-body cardStyle p-0">
          <img class="card-img-top" src="<?php echo base_url('assets/uploads/1716392003_82e3205fcd31653cfb94.png');?>" alt="Card image cap">
        </div>
      </div>
    </div>
    <!-- CARD 2 -->
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 styleCardExt">
      <div class="card">
        <div class="card-body cardStyle p-0">
          <img class="card-img-top" src="<?php echo base_url('assets/uploads/1716478065_0874bb572f6e2063335e.jpg');?>" alt="Card image cap">
        </div>
      </div>
    </div>
    <!-- CARD 3 -->
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 styleCardExt">
      <div class="card">
        <div class="card-body cardStyle p-0">
          <img class="card-img-top" src="<?php echo base_url('assets/uploads/1716764780_61b320a487ea8fbf304b.jpg');?>" alt="Card image cap">
        </div>
      </div>
    </div>
    <!-- CARD 4 -->
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 styleCardExt">
      <div class="card">
        <div class="card-body cardStyle p-0">
          <img class="card-img-top" src="<?php echo base_url('assets/uploads/1716839606_3d4d6e03b93ede3b5207.jpg');?>" alt="Card image cap">
        </div>
      </div>
    </div>
  </div>
  <br>
  <a class="btn btn-princ mt-2 h-75 pb-3" href="<?php echo base_url('catalogo')?>">Ver mas</a>
  </div>
