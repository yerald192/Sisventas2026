<?php require_once __DIR__ . '/../../layouts/header.php'; ?>
<div class="card p-3">
    <h3>REGISTRAR PRODUCTO</h3>
    <form action="" method="post">
        <div class="row">
            <div class="col-md-4 form-group">
                <label for="">CATEGORIA :</label>
                <select name="" id="">
                    <option value="">SELECIONE UNA CATEGORIA</option>
                    <?php 
                    foreach ($categorias as $c) {
                        echo '<option value="' . $c['id'] . '">' . $c['nombre'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-4 form-group">
                <label for="codigo">CODIGO :</label>
                <input type="text" class="form-control" name="codigo" id="codigo" maxlength="50" required>
            </div>
            <div class="col-md-4 form-group">
                <label for="nombre">NOMBRE :</label>
                <input type="text" class="form-control" name="nombre" id="nombre" maxlength="150" required>
            </div>
            <div class="col-md-4 form-group">
                <label for="descripcion">DESCRIPCION :</label>
                <input type="text" class="form-control" name="descripcion" id="descripcion" maxlength="500" required>
            </div>
            <div class="col-md-4 form-group">
                <label for="precio">PRECIO VENTA :</label>
                <input type="number" class="form-control" name="precio" id="precio" required>
            </div>
            <div class="col-md-4 form-group">
                <label for="stock">STOCK ACTUAL :</label>
                <input type="number" class="form-control" name="stock" id="stock" required>
            </div>
        </div>
    </form>
</div>
<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>