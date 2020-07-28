<div class="row">
    <div class="col-md-4 mx-auto">
        <div class="card">
            <div class="card-header">
                Registro
            </div>
            <div class="card-body">
                <?php if (isset($_SESSION['user']) && isset($_SESSION['user']) == 'failed') : ?>
                    <div class="alert alert-danger" role="alert">
                        Email ya registrado
                    </div>
                <?php endif; ?>
                <?php Utils::deleteSession('user') ?>
                <form action="<?= baseUrl ?>user/addUser" method="POST">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Nombre" required>
                        <?php if (isset($_SESSION['name']) && isset($_SESSION['name']) == 'failed') : ?>
                            <div class="text-danger small">
                                Nombre es requerido
                            </div>
                        <?php endif; ?>
                        <?php Utils::deleteSession('name'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" name="surname" class="form-control" placeholder="Apellido" required>
                        <?php if (isset($_SESSION['surname']) && isset($_SESSION['surname']) == 'failed') : ?>
                            <div class="text-danger small">
                                Apellido es requerido
                            </div>
                        <?php endif; ?>
                        <?php Utils::deleteSession('surname'); ?>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                        <?php if (isset($_SESSION['email']) && isset($_SESSION['email']) == 'failed') : ?>
                            <div class="text-danger small">
                                Email es requerido
                            </div>
                        <?php endif; ?>
                        <?php Utils::deleteSession('email'); ?>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                        <?php if (isset($_SESSION['password']) && isset($_SESSION['password']) == 'failed') : ?>
                            <div class="text-danger small">
                                Contraseña es requerida
                            </div>
                        <?php endif; ?>
                        <?php Utils::deleteSession('password'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</div>