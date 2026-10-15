<?php require_once __DIR__ . '/../../layouts/header.php'; ?>
<div class="card p-3">
    <h3>REGISTRAR PRODUCTO</h3>
    <form action="<?= BASE_URL ?>/admin/productos/guardar" method="post">
        <div class="row">
            <div class="col-md-4 form-group">
                <label for="categoria">CATEGORIA :</label>
                <select class="form-control" name="categoria" id="categoria" required>
                    <option value="">SELECCIONE UNA CATEGORIA</option>
                    <?php
                    foreach ($categorias as $categoria) {
                        echo '<option value="' . $categoria['id'] . '">' . $categoria['nombre'] . '</option>';
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
            <div class="col-md-8 form-group">
                <label for="descripcion">DESCRIPCION :</label>
                <textarea type="textarea" class="form-control" name="descripcion" id="descripcion" maxlength="500" rows="1" required></textarea>
            </div>
            <div class="col-md-2 form-group">
                <label for="precio">PRECIO VENTA :</label>
                <input type="number" class="form-control" name="precio" id="precio" step="0.10" min="0.10" required value="0.10">
            </div>
            <div class="col-md-2 form-group">
                <label for="stock">STOCK ACTUAL :</label>
                <input type="number" class="form-control" name="stock" id="stock" min="1" required value="1">
            </div>
        </div>
        <div class="card-footer" style="text-align:center;">
            <a href="<?= BASE_URL ?>/admin/productos" class="btn btn-danger"><i class="fas fa-times"></i> CANCELAR</a>
            <button class="btn btn-secondary" type="reset"><i class="fas fa-trash"></i> LIMPIAR</button>
            <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> GUARDAR</button>
        </div>
    </form>
</div>
<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>