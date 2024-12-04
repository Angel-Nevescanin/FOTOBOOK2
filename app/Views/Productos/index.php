<!-- app/Views/productos/index.php -->
<?php $this->extend("layouts/plantilla"); ?>

<?php $this->section("titulo"); ?>
Productos
<?php $this->endSection(); ?>

<?php $this->section("content"); ?>
<section class="row">
    <div class="col-12 card">
        <div class="card-header">
            <a href="<?= base_url('/productos/create'); ?>" class="btn btn-success btn-sm">Nuevo Producto</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productos as $producto): ?>
                        <tr>
                            <td><?= $producto['id']; ?></td>
                            <td><?= $producto['nombre']; ?></td>
                            <td><?= $producto['descripcion']; ?></td>
                            <td><?= $producto['precio']; ?></td>
                            <td>
                                <a href="<?= base_url("/productos/{$producto['id']}/edit"); ?>" class="btn btn-primary btn-sm">Editar</a>
                                <a href="<?= base_url("/productos/{$producto['id']}"); ?>" class="btn btn-warning btn-sm">Ver</a>
                                <a href="<?= base_url("/productos/{$producto['id']}/delete"); ?>" class="btn btn-danger btn-sm">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<?php $this->endSection(); ?>
