<div class="row">
    <div class="col-md-4 mx-auto">
        <div class="card">
            <div class="card-header">
                Iniciar sesión
            </div>
            <div class="card-body">
                <?php if (isset($_SESSION['user']) && $_SESSION['user'] == 'failed') : ?>
                    <div class="alert alert-danger" role="alert">
                        Email o contraseña erronea
                    </div>
                <?php endif; ?>
                <?php Utils::deleteSession('user'); ?>
                <form action="<?= baseUrl ?>user/login" method="POST">
                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="Correo electronico" require>
                        <?php if (isset($_SESSION['email']) && $_SESSION['email'] == 'failed') : ?>
                            <div class="text-danger small">
                                Email es requerido
                            </div>
                        <?php endif; ?>
                        <?php Utils::deleteSession('email'); ?>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Contraseña" require>
                        <?php if (isset($_SESSION['password']) && $_SESSION['password'] == 'failed') : ?>
                            <div class="text-danger small">
                                Contraseña es requerida
                            </div>
                        <?php endif; ?>
                        <?php Utils::deleteSession('password'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                </form>
            </div>
        </div>
    </div>
</div>