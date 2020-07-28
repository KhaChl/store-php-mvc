<div class="row">
    <div class="col-5 mx-auto">
        <div class="card">
            <div class="card-header">
                <?php if (isset($product)) : ?>
                    Editar producto
                    <?php $url = baseUrl . "product/createOrUpdate&id=$product->id" ?>
                <?php else : ?>
                    Nuevo producto
                    <?php $url = baseUrl . "product/createOrUpdate" ?>
                <?php endif; ?>
            </div>
            <div class="card-body">

                <form action="<?= $url ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Nombre</span>
                            </div>
                            <input type="text" name="name" class="form-control" value="<?= isset($product) ? $product->name : '' ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Descripción</span>
                            </div>
                            <textarea rows="4" name="description" class="form-control" required><?= isset($product) ? $product->description : '' ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Precio</span>
                            </div>
                            <input type="number" name="price" class="form-control" value="<?= isset($product) ? $product->price : '' ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Stock</span>
                            </div>
                            <input type="number" name="stock" class="form-control" value="<?= isset($product) ? $product->stock : '' ?>" required>
                        </div>
                    </div>
                    <?php $categories = Utils::showCategories() ?>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Categorias</span>
                            </div>
                            <select name="category" class="form-control">
                                <?php while ($cat = $categories->fetch_object()) : ?>
                                    <option value="<?= $cat->id ?>" <?= isset($product) && $cat->id == $product->category_Id ? "selected" : '' ?>>
                                        <?= $cat->name ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Imagen</span>
                            </div>
                            <input type="file" name="image" class="form-control">
                        </div>
                    </div>
                    <?php if (isset($product)) : ?>
                        <img src="<?= baseUrl ?>uploads/images/<?= $product->image ?>" class="rounded float-left img-thumbnail mb-3" alt="<?= $product->image ?>">
                        <button type="submit" class="btn btn-primary">Editar</button>
                    <?php else : ?>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
</div>