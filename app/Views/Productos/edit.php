<!-- views/productos/edit -->

<?php $this->extend("plantilla"); // Plantilla que usaremos ?>

<?php $this->section("titulo"); ?> 
Editar Producto
<?php $this->endSection(); ?>

<?php $this->section("content"); // Aquí empieza el contenido ?>

<section class="row">
    <div class="col-12 card">
        <div class="card-header">
            <h3 class="card-title">Datos del Producto</h3>
        </div>
        <div class="card-body">

        <form action="/productos/<?= $producto["id"]; ?>/update" method="POST" name="productoForm" enctype="multipart/form-data">
    <div class="mb-3">
        <label class="form-label" for="Nombre">Nombre</label>
        <input class="form-control" type="text" name="Nombre" value="<?= $producto["Nombre"]; ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label" for="Descripcion">Descripción</label>
        <textarea class="form-control" name="Descripcion" required><?= $producto["Descripcion"]; ?></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label" for="Precio">Precio</label>
        <input class="form-control" type="number" step="0.01" name="Precio" value="<?= $producto["Precio"]; ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label" for="Imagen">Imagen</label>
        <input class="form-control" type="file" name="Imagen">
        <?php if ($producto["Imagen"]): ?>
            <img src="<?= base_url('uploads/' . $producto["Imagen"]); ?>" alt="Imagen del producto" class="img-thumbnail mt-2" width="150">
        <?php endif; ?>
    </div>

    <button class="btn btn-success" type="submit">Guardar Cambios</button>
</form>

        </div>
    </div>
</section>

<?php $this->endSection("content"); // Aquí termina el contenido ?>
