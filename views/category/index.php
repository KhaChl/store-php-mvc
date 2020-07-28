<div class="row">
    <div class="mx-auto py-3">
        <a class="btn btn-success" href="<?= baseUrl ?>category/addOrUpdate&form=create&id=create">Crear nueva categoria</a>
    </div>
</div>
<div class="row">
    <div class="mx-auto">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($cat = $categories->fetch_object()) : ?>
                    <tr>
                        <td><?= $cat->id ?></td>
                        <td><?= $cat->name ?></td>
                        <td>
                            <a class="btn btn-primary" href="<?= baseUrl ?>category/addOrUpdate&form=edit&id=<?= $cat->id ?>">Editar</a>
                            <a class="btn btn-danger" href="<?= baseUrl ?>category/deleteCategory&id=<?= $cat->id ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <?php if (isset($_SESSION['form']) && $_SESSION['form'] = 'true') : ?>

        <?php if (isset($_SESSION['create']) && $_SESSION['create'] = 'true') : ?>
            <?php $url = baseUrl . "category/add" ?>
        <?php endif;  ?>
        <?php if (isset($_SESSION['edit']) && $_SESSION['edit'] = 'true') : ?>
            <?php $id = isset($_GET['id']) ? $_GET['id'] : ''; ?>
            <?php $url = baseUrl . "category/update&id=$id" ?>
        <?php endif;  ?>
        <div class="mx-auto">
            <div class="card">
                <?php if (isset($_SESSION['create']) && $_SESSION['create'] = 'true') : ?>
                    <?php $url = baseUrl . "category/add" ?>
                    <div class="card-header">
                        Crear
                    </div>
                <?php endif;  ?>
                <?php if (isset($_SESSION['edit']) && $_SESSION['edit'] = 'true') : ?>
                    <?php $id = isset($_GET['id']) ? $_GET['id'] : ''; ?>
                    <?php $url = baseUrl . "category/update&id=$id" ?>
                    <div class="card-header">
                        Editar
                    </div>
                <?php endif;  ?>
                <div class="card-body">
                    <form action="<?= $url ?>" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" value="<?= isset($_GET['name']) ? $_GET['name'] : '' ?>" required>
                        </div>
                        <?php if (isset($_SESSION['create']) && $_SESSION['create'] = 'true') : ?>
                            <input type="submit" class="btn btn-success" name="form" value="Crear">
                        <?php endif; ?>
                        <?php Utils::deleteSession('create') ?>
                        <?php if (isset($_SESSION['edit']) && $_SESSION['edit'] = 'true') : ?>
                            <input type="submit" class="btn btn-primary" name="form" value="Editar">
                        <?php endif; ?>
                        <?php Utils::deleteSession('edit') ?>
                        <a class="btn btn-secondary" href="<?= baseUrl ?>/category/index">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php Utils::deleteSession('form') ?>
</div>