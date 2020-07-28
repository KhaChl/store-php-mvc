<div class="row mx-md-n5">
    <div class="col px-md-5">
        <img src="<?= baseUrl ?>uploads/images/<?= $product->image ?>" class="img-fluid border rounded">
    </div>
    <div class="col px-md-5" style="width: 17rem;">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?= $product->name ?></h5>
                <p class="card-text"><?= $product->description ?></p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Precio: <?= $product->price ?></li>
                <li class="list-group-item">Stock: <?= $product->stock ?> </li>
            </ul>
            <div class="card-body">
                <a class="btn btn-success btn-block" href="<?= baseUrl ?>cart/addItemCart&id=<?= $product->id ?>">Comprar</a>
            </div>
        </div>
    </div>
</div>