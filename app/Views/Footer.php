<footer>
  <div class="container mt-5 p-0">
    <div class="row p-0 m-0 d-flex flex-row ">
      <!-- Primer columna logo -->
      <div class="col-xxl-6 col-xl-6 col-lg-6 col-12align-items-center column p-0">
          <a href="http://localhost/proyecto_Lu_Teves/"><img src="<?php echo base_url('assets/img/logonegro.png') ?>" alt="Logo" class="d-inline-block" style="whidth:130px; height:130px;"></a>
      </div>
      <!-- Segunda columna -->
      <div class="col-xxl-6 col-xl-6 col-lg-6 col-12 align-items-center column p-0">
        <!-- Primer fila dentro de la columba -->
        <div class="row d-flex flex-row text-center styleFooter">
          <h5>Visitanos en nuestra sucursal</h5>
        </div>
        <!-- Script para boton -->
        <script>
            function nuevaPestaña() {
              window.open('https://www.google.com/maps/place/Bol%C3%ADvar+11,+S2300FEE+Rafaela,+Santa+Fe/@-31.2499834,-61.4940235,17z/data=!3m1!4b1!4m6!3m5!1s0x95caae388dff17c1:0x5764917e2ae84b62!8m2!3d-31.249988!4d-61.4914486!16s%2Fg%2F11c271f31n?entry=ttu', '_blank');
            }
        </script>
        <!-- Boton del mapa -->
        <button class="btn custom-btn" onclick="nuevaPestaña()">
          <i class="bi bi-geo-alt custom-icon"></i>Ver ubicacion
        </button>
        <!-- Segunda fila dentro de la columna -->
        <div class="row d-flex flex-row styleFooter text-center">
          <h5>Seguinos en nuestras redes</h5>
          <a href="https://www.instagram.com/mercurio.cellshop/" target="_blank">
            <i class="bi bi-instagram"></i>
          </a>
          <a href="https://web.facebook.com/MercurioCellShop?locale=es_LA" target="_blank">
            <i class="bi bi-facebook"></i>
          </a>
          <a href="https://web.whatsapp.com/" target="_blank">
            <i class="bi bi-whatsapp"></i>
          </a>
        </div>
      </div>
    </div>
    <div class="row m-0 p-0 estiloDerechos">
      <div class="col">
        <p class="text-black">©Todos los derechos reservados. Diseñado por Téves Ana Luz</p>
      </div>
    </div>
  </div>
</footer>