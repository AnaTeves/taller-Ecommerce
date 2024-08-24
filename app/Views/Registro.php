<div class="container">
    <div class=""> 
        <div class="">
            <div class="card-container estiloTarjeta row p-4 d-flex m-auto mt-4 mb-4 justify-content-center col-lg-4 col-md-6">
                <?php $validation = \Config\Services::validation(); ?>
                <form class="d-flex flex-column" action="<?php echo base_url('Registro_controller/formValidation') ?>" method="post">
                    <?php if (!empty(session()->getFlashdata('mensaje'))) : ?>
                        <div class="alert alert-success"><?= session()->getFlashdata('mensaje'); ?></div>
                    <?php endif ?>
                    <h1 class="text-center text-black">Registro</h1>
                    <div class="form-group">
                        <label class="text-black">Nombre</label>
                        <input class="form-control" type="text" name="nombre" placeholder="Nombre" value="<?php echo set_value('nombre'); ?>">
                        <?php if ($validation->getError('nombre')) { ?>
                            <div class='alert alert-danger'>
                                <?= $error = $validation->getError('nombre'); ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label class="text-black">Apellido</label>
                        <input class="form-control" type="text" name="apellido" placeholder="Apellido" value="<?php echo set_value('apellido'); ?>">
                        <?php if ($validation->getError('apellido')) { ?>
                            <div class='alert alert-danger'>
                                <?= $error = $validation->getError('apellido'); ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label class="text-black">Correo electrónico</label>
                        <input class="form-control" type="text" name="email" placeholder="Correo electrónico" value="<?php echo set_value('email'); ?>">
                        <?php if ($validation->getError('email')) { ?>
                            <div class='alert alert-danger'>
                                <?= $error = $validation->getError('email'); ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label class="text-black">Constraseña</label>
                        <input class="form-control" type="password" name="Contraseña" placeholder="Contraseña">
                        <?php if ($validation->getError('Contraseña')) { ?>
                            <div class='alert alert-danger'>
                                <?= $error = $validation->getError('Contraseña'); ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label class="text-black">Repetir contraseña</label>
                        <input class="form-control" type="password" name="password_confirm" placeholder="Repetir contraseña">
                        <?php if ($validation->getError('password_confirm')) { ?>
                            <div class='alert alert-danger'>
                                <?= $error = $validation->getError('password_confirm'); ?>
                            </div>
                        <?php } ?>
                    </div>
                    <br>
                    <button type="submit" class="btn styleButton text-black">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>
