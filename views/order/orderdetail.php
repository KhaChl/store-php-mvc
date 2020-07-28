<?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) : ?>
    <div class="row">
        <div class="mx-auto m-3">
            <h3>Cambiar estado del pedido</h3>
            <h4>Estado actual: <?= Utils::showStatus($orderStatus->state) ?></h4>
            <form action="<?= baseUrl ?>order/changeStateOrder" method="POST">
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Estado</span>
                        </div>
                        <input type="hidden" value="<?= $id ?>" name="idpedido">
                        <select name="state" class="form-control">
                            <option value="pending">
                                <?= Utils::showStatus("pending") ?>
                            </option>
                            <option value="ready">
                                <?= Utils::showStatus("ready") ?>
                            </option>
                            <option value="send">
                                <?= Utils::showStatus("send") ?>
                            </option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Cambiar estado</button>
            </form>
        </div>
    </div>
<?php endif; ?>
<div class="row">
    <div class="mx-auto">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Unidades</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($prodOrder = $productOrder->fetch_object()) : ?>
                    <tr>
                        <td>
                            <img src="<?= baseUrl ?>uploads/images/<?= $prodOrder->image ?>" alt="<?= $prodOrder->image ?>" style="height: 150px;">
                        </td>
                        <td><?= $prodOrder->name ?></td>
                        <td><?= $prodOrder->price ?></td>
                        <td><?= $prodOrder->units ?></td>

                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) : ?>
            <a class="btn btn-primary" href="<?= baseUrl ?>order/orderManagement">Volver</a>
        <?php else : ?>
            <a class="btn btn-primary" href="<?= baseUrl ?>order/mylistorders">Volver</a>
        <?php endif; ?>
    </div>
</div>