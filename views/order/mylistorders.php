<div class="row">
    <div class="mx-auto">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>N° de orden</th>
                    <th>Total compra</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($ord = $orders->fetch_object()) : ?>
                    <tr>
                        <td><a href="<?= baseUrl ?>order/orderDetail&id=<?= $ord->id ?>"><?= $ord->id ?></a></td>
                        <td>$<?= $ord->total_Purchase ?></td>
                        <td><?= $ord->date_Purchase ?></td>
                        <td><?= Utils::showStatus($ord->state) ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>