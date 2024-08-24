<div class="container">
<div class="row p-4 d-flex m-auto justify-content-center"> <!-- Contenedor row -->
    <div class="col-md-7">
        <!-- CARD -->    
        <div class="card-container row">
            <div class="col">
                <!-- Muestra el mensaje en caso de error -->
                <?php if (!empty(session()->getFlashdata('mensaje'))) : ?>
                <div class="alert alert-success"><?= session()->getFlashdata('mensaje'); ?></div>
                <?php endif ?>
                <!-- Informacion adicional -->
                <h4 class="m-3 text-black">Información</h4>
                <p class="text-black">Titular de la empresa: Santiago De Giovanni.</p>
                <p class="text-black">Teléfono de la empresa: +54 3492530335.</p>
                <!-- Mapa que muestra la ubicacion del local -->
                <div class="row">
                    <iframe class= "shadow p-0 styleMaps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13643.681322621429!2d-61.50093334788507!3d-31.25062873405942!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95caae388dff17c1%3A0x5764917e2ae84b62!2sBol%C3%ADvar%2011%2C%20S2300FEE%20Rafaela%2C%20Santa%20Fe!5e0!3m2!1ses!2sar!4v1713419003194!5m2!1ses!2sar" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>       
            </div>
            <!-- ACA VA EL FORMULARIO -->
            <div class="col ">
                <!-- La siguiente linea de codigo recupera los datos que fueron validados -->
                <?php $validation = \Config\Services::validation(); ?> 
                <form method="post" action="<?php echo base_url('Contacto_controller/formValidation')?>">
                    <h1 class="text-black">¡Contactanos!</h1>
                    <?php if(session('login')){ ?> <!-- Si la sesion esta iniciada -->
                    <!-- Campo asunto -->
                    <div class="form-group">
                        <label class="text-black">Asunto</label>
                        <input type="text" class="form-control" placeholder="Asunto" name="asunto">
                        <!-- Error -->
                        <?php if($validation->getError('asunto')){ ?>
                        <div class='alert alert-danger mt-2'>
                            <?= $error = $validation->getError('asunto'); ?>
                        </div>
                        <?php }?>
                    </div>
                    <!-- Campo consulta -->
                    <div class="form-group">
                        <label class="text-black">Consulta</label>
                        <textarea class="form-control row-3" placeholder="Ingrese su consulta" name="consulta"></textarea>
                        <!-- Error -->
                        <?php if($validation->getError('consulta')){ ?>
                        <div class='alert alert-danger mt-2'>
                            <?= $error = $validation->getError('consulta'); ?>
                        </div>
                        <?php }?>
                    </div>
                    <br>
                    <!-- Boton de enviar -->
                    <button type="submit" class="btn btn-primary styleButton">Enviar</button>
                    <?php }  else {  ?> <!-- Si la sesion no esta iniciada -->
                    <!-- Campo nombre -->
                    <div class="form-group">
                        <label class="text-black">Nombre</label>
                        <input type="text" class="form-control" placeholder="Ingrese su nombre" name="nombre">
                        <!-- Error -->
                        <?php if($validation->getError('nombre')){ ?>
                        <div class='alert alert-danger mt-2'>
                            <?= $error = $validation->getError('nombre'); ?>
                        </div>
                        <?php }?>
                    </div>
                    <!-- Campo email -->
                    <div class="form-group">
                        <label class="text-black">Correo electronico</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese su correo electronico" name="correo">
                        <!-- Error -->
                        <?php if($validation->getError('correo')){ ?>
                        <div class='alert alert-danger mt-2'>
                            <?= $error = $validation->getError('correo'); ?>
                        </div>
                        <?php }?>
                    </div>
                    <!-- Campo asunto -->
                    <div class="form-group">
                        <label class="text-black">Asunto</label>
                        <input type="text" class="form-control" placeholder="Asunto" name="asunto">
                        <!-- Error -->
                        <?php if($validation->getError('asunto')){ ?>
                        <div class='alert alert-danger mt-2'>
                            <?= $error = $validation->getError('asunto'); ?>
                        </div>
                        <?php }?>
                    </div>
                    <!-- Campo consulta -->
                    <div class="form-group">
                        <label class="text-black">Consulta</label>
                        <textarea class="form-control row-3" placeholder="Ingrese su consulta" name="consulta"></textarea>
                        <!-- Error -->
                        <?php if($validation->getError('consulta')){ ?>
                        <div class='alert alert-danger mt-2'>
                            <?= $error = $validation->getError('consulta'); ?>
                        </div>
                        <?php }?>
                    </div>
                    <br>
                    <!-- Boton de enviar -->
                    <button type="submit" class="btn btn-primary styleButton">Enviar</button>
                    <?php }  ?>
                </form>
            </div>
        </div>
    </div>
</div>
</div>


