<div class="row">
    <div class="mx-auto py-3">
        <a class="btn btn-success" href="<?= baseUrl ?>product/createProduct">Crear producto</a>
    </div>
</div>
<div class="row">
    <div class="mx-auto">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>N° de compras</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($prod = $products->fetch_object()) : ?>
                    <tr>
                        <td><?= $prod->id ?></td>
                        <td><?= $prod->name ?></td>
                        <td><?= $prod->price ?></td>
                        <td><?= $prod->stock ?></td>
                        <td><?= $prod->favorite ?></td>
                        <td>
                            <a class="btn btn-primary" href="<?= baseUrl ?>product/editProduct&id=<?= $prod->id ?>">Editar</a>
                            <a class="btn btn-danger" href="<?= baseUrl ?>product/deleteProduct&id=<?= $prod->id ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>