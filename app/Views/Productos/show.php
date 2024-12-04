<!-- views/productos/show -->

<?php $this->extend("plantilla"); // Plantilla que usaremos ?>

<?php $this->section("titulo"); ?> 
Detalle del Producto
<?php $this->endSection(); ?>

<?php $this->section("content"); // Aquí empieza el contenido ?>

<section class="row">
    <div class="col-12 card">
        <div class="card-header">
            <h3 class="card-title"><?= $producto["Nombre"]; ?></h3>
        </div>
        <div class="card-body">
            <ul>
                <li><b>Nombre:</b> <?= $producto["Nombre"]; ?></li>
                <li><b>Descripción:</b> <?= $producto["Descripcion"]; ?></li>
                <li><b>Precio:</b> <?= number_format($producto["Precio"], 2); ?> USD</li>
                <li><b>Creado por Usuario ID:</b> <?= $producto["usuario_id"]; ?></li>
                <li><b>Fecha de Creación:</b> <?= $producto["created_at"]; ?></li>
                <li><b>Última Actualización:</b> <?= $producto["updated_at"]; ?></li>
                <li>
                    <b>Imagen:</b><br>
                    <?php if ($producto["Imagen"]): ?>
                        <img src="<?= base_url('uploads/' . $producto["Imagen"]); ?>" alt="Imagen del producto" class="img-thumbnail" width="200">
                    <?php else: ?>
                        <span class="text-muted">Sin imagen</span>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
</section>

<?php $this->endSection(); // Aquí termina el contenido ?>
