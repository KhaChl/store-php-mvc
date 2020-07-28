<div class="row">
    <div class="col-md-4 mx-auto">
        <div class="card">
            <div class="card-header">
                Direccion de envio
            </div>
            <div class="card-body">
                <?php if (isset($_SESSION['user']) && $_SESSION['user'] == 'failed') : ?>
                    <div class="alert alert-danger" role="alert">
                        Error al guardar datos
                    </div>
                <?php endif; ?>
                <?php Utils::deleteSession('user'); ?>
                <form action="<?= baseUrl ?>user/updateDataUser" method="POST">
                    <div class="form-group">
                        <input type="text" name="region" class="form-control" placeholder="Region" value="<?= $_SESSION['identity']->region ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="city" class="form-control" placeholder="Ciudad" value="<?= $_SESSION['identity']->city ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="address" class="form-control" placeholder="Dirección" value="<?= $_SESSION['identity']->address ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>