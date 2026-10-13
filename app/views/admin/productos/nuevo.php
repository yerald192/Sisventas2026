<?php require_once __DIR__ . '/../../layouts/header.php'; ?>
<div class="card p-3">
    <h3>REGISTRAR PRODUCTO</h3>
    <form action="" method="post">
        <div class="row">
            <div class="col-md-4 form-group">
                <label for="categoria_id">CATEGORIA :</label>
                <select class="form-control" name="categoria_id" id="categoria_id" required>
                    <option value="">SELECCIONE UNA CATEGORIA</option>
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
            <button class="btn btn-danger" type="button"><i class="fas fa-times"></i> CANCELAR</button>
            <button class="btn btn-secondary" type="reset"><i class="fas fa-trash"></i> LIMPIAR</button>
            <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> GUARDAR</button>
        </div>
    </form>
</div>
<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>