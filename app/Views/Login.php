<div class="container">
    <div class=""> 
        <div class="">
            <div class="card-container row p-4 d-flex m-auto mt-4 mb-4 justify-content-center col-lg-4 col-md-6">
            <!-- La siguiente linea de codigo recupera los datos que fueron validados -->
            <?php $validation = \Config\Services::validation(); ?>
            <form class="d-flex flex-column" action="<?php echo base_url('Login_controller/login_usuario') ?>" method="post">
                <h1 class="text-center text-black">Iniciar sesión</h1>
                <?php if (!empty(session()->getFlashdata('mensaje'))) : ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('mensaje'); ?></div>
                <?php endif ?>
                <!-- Campo correo electronico -->
                <div class="form-group">
                    <label class="text-black">Correo electrónico</label>
                    <input class="form-control" type="text" name="email" placeholder="Ingrese su email">
                    <!-- Error -->
                    <?php if ($validation->getError('email')) { ?>
                    <div class='alert alert-danger'>
                        <?= $error = $validation->getError('email'); ?>
                    </div>
                    <?php } ?>
                </div>        
                <!-- Campo contraseña -->
                <div class="form-group">
                    <label class="text-black">Constraseña</label>
                    <input class="form-control" type="password" name="password" placeholder="Ingrese su contraseña">
                    <!-- Error -->
                    <?php if ($validation->getError('password')) { ?>
                    <div class='alert alert-danger'>
                        <?= $error = $validation->getError('password'); ?>
                    </div>
                    <?php } ?>
                </div><br>
                <div>
                    <label>Si aún no tiene una cuenta <a class="text-blue text-decoration-underline" href="<?php echo base_url('registro');?>">registrese aquí</a></label>
                </div>
                <button type="submit" class="btn btn-primary styleButton">Enviar</button>
            </form>
            </div>
        </div>
    </div>
</div>