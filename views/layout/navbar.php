<!-- NavBar -->
<nav class="navbar navbar-expand-lg navbar-light px-5" style="background-color: #bbe1fa;">
    <a class="navbar-brand " href="<?= baseUrl ?>product/index">Store</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto">
            <?php if (!isset($_SESSION['identity'])) : ?>
                <li class="nav-item  m-1">
                    <a class="nav-link" href="<?= baseUrl ?>user/signin">Iniciar sesión</a>
                </li>
                <li class="nav-item m-1">
                    <a class="nav-link" href="<?= baseUrl ?>user/signup">Registrarse</a>
                </li>
            <?php endif; ?>
            <?php if (isset($_SESSION['identity'])) : ?>
                <li class="nav-item dropdown m-1">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Mi cuenta
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="<?= baseUrl ?>user/mydata">Mis datos</a>
                        <a class="dropdown-item" href="<?= baseUrl ?>order/mylistorders">Mis pedidos</a>
                        <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) : ?>
                            <a class="dropdown-item" href="<?= baseUrl ?>order/orderManagement">Gestionar pedidos</a>
                            <a class="dropdown-item" href="<?= baseUrl ?>product/management">Gestionar productos</a>
                            <a class="dropdown-item" href="<?= baseUrl ?>category/index">Gestionar categorias</a>
                        <?php endif; ?>
                    </div>
                </li>
                <li class="nav-item m-1">
                    <a class="nav-link" href="<?= baseUrl ?>user/signout">Cerrar sesión</a>
                </li>
            <?php endif; ?>
            <?php $stats =  Utils::statsCart(); ?>
            <li class="nav-item m-1">
                <a class="nav-link" href="<?= baseUrl ?>cart/index">Carrito(<?= $stats['count'] ?>)</a>
            </li>
        </ul>
    </div>
</nav>
<!-- End Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarNav">
        <?php $categories = Utils::showCategories() ?>
        <?php while ($cat = $categories->fetch_object()) : ?>
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= baseUrl ?>product/productCategory&id=<?= $cat->id ?>"><?= $cat->name ?></a>
                </li>
            </ul>
        <?php endwhile; ?>
    </div>
</nav>
<!-- Content -->
<div class="container py-5 ">