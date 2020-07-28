<div class="row">
    <div class="mx-auto">
        <form action="<?= baseUrl ?>order/purchase" method="POST">
            <div class="card">
                <div class="card-header">
                    Dirección para envio
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Region</span>
                            </div>
                            <input type="text" name="region" class="form-control" value="<?= isset($_SESSION['identity']) ? $_SESSION['identity']->region : '' ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Ciudad</span>
                            </div>
                            <input type="text" name="city" class="form-control" value="<?= isset($_SESSION['identity']) ? $_SESSION['identity']->city : '' ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Dirección</span>
                            </div>
                            <input type="text" name="address" class="form-control" value="<?= isset($_SESSION['identity']) ? $_SESSION['identity']->address : '' ?>" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Confirmar</button>
                </div>
            </div>
        </form>
    </div>
</div>