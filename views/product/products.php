<div class="row">
    <?php while ($prod = $products->fetch_object()) :  ?>
        <div class="col-6 col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="card">
                <a href="<?= baseUrl ?>product/detail&id=<?= $prod->id ?>">
                    <img src="<?= baseUrl ?>uploads/images/<?= $prod->image ?>" class="card-img-top " alt="<?= $prod->image ?>">
                </a>
                <div class="card-body">
                    <h5 class="card-title"><?= $prod->name ?></h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Precio: <?= $prod->price ?></li>
                    <li class="list-group-item">Stock: <?= $prod->stock ?></li>
                </ul>
                <div class="card-body">
                    <a class="btn btn-success btn-block" href="<?= baseUrl ?>cart/addItemCart&id=<?= $prod->id ?>">Comprar</a>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
</div>