<table class="table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Title</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($products as $product): ?>
    <tr>
        <td><a href="product.php?id=<?= $product->id?>"><?= $product->id ?></a></td>
        <td><a href="product.php?id=<?= $product->id?>"><?= $product->title ?></a></td>
        <?php endforeach; ?>
    </tbody>
</table>
