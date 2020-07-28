 <?php if (isset($_SESSION['cart'])) : ?>
     <div class="row">
         <div class="mx-auto m-3">
             <a class="btn btn-danger" href="<?= baseUrl ?>cart/deleteCart">Vaciar Carrito</a>
         </div>
     </div>
 <?php endif; ?>
 <div class="row">
     <div class="mx-auto">
         <?php if (isset($_SESSION['cart'])) : ?>
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
                     <?php foreach ($products as $index => $value) : ?>
                         <tr>
                             <td>
                                 <img src="<?= baseUrl ?>uploads/images/<?= $value['product']->image ?>" alt="<?= $value['product']->image ?>" style="height: 150px;">
                             </td>
                             <td><?= $value['product']->name ?></td>
                             <td><?= $value['product']->price ?></td>
                             <td>
                                 <div class="row">
                                     <div class="col">
                                         <a href="<?= baseUrl ?>cart/minusItemCart&index=<?= $index ?>"><i class="fas fa-minus"></i></a>
                                     </div>
                                     <div class="col">
                                         <?= $value['units'] ?>
                                     </div>
                                     <div class="col">
                                         <a href="<?= baseUrl ?>cart/addItemCart&id=<?= $value['product']->id ?>"><i class="fas fa-plus"></i></a>
                                     </div>
                                 </div>
                                 <div class="row justify-content-md-center">
                                     <div class="col-md-auto">
                                         <a href="<?= baseUrl ?>cart/removeItemCart&index=<?= $index ?>"><i class="far fa-trash-alt"></i></a>
                                     </div>
                                 </div>
                             </td>
                         </tr>
                     <?php endforeach; ?>
                     <?php $stats = Utils::statsCart(); ?>
                     <tr>
                         <th>Total:</th>
                         <td></td>
                         <td><?= $stats['total'] ?></td>
                         <td><a class="btn btn-success" href="<?= baseUrl ?>order/index">Comprar</a></td>
                     </tr>
                 </tbody>
             </table>
         <?php else : ?>
             <table class="table table-bordered">
                 <thead>
                     <tr>
                         <th>Carrito Vacio</th>
                     </tr>
                 </thead>
             </table>
         <?php endif; ?>
     </div>
 </div>