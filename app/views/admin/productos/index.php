<?php require __DIR__ . '/../../layouts/header.php'; ?>
<div class="card p-2">
    <h3>Lista de productos</h3>
    <br>
    <a href="<?= BASE_URL ?>/admin/productos/nuevo" class="btn btn-success col-2"> Nuevo </a>
    <table class="table-bordered  m-3">
        <thead>
            <tr style="text-align: center;">
                <th>Nro</th>
                <th>Categoria</th>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $contador = 0;
            foreach ($productos as $producto) {
                $contador += 1 ?>
                <tr>
                    <td><?php echo $contador ?></td>
                    <td><?php echo $producto['categoria_nombre']; ?></td>
                    <td><?php echo $producto['codigo_sku']; ?></td>
                    <td><?php echo $producto['nombre']; ?></td>
                    <td><?php echo $producto['descripcion']; ?></td>
                    <td><?php echo $producto['precio_venta']; ?></td>
                    <td><?php echo $producto['stock_actual']; ?></td>
                    <td class="p-2">
                        <a class="btn btn-outline-primary" title="Editar" href="<?= BASE_URL ?>/admin/productos/editar/<?= $producto['id'] ?>"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-outline-danger" title="Eliminar" href="<?= BASE_URL ?>/admin/productos/eliminar/<?= $producto['id'] ?>"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php require __DIR__ . '/../../layouts/footer.php'; ?>