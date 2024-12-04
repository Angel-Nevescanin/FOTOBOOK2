<!-- app/Views/productos/index.php -->
<?php $this->extend("plantilla"); ?>

<?php $this->section("titulo"); ?>
Productos
<?php $this->endSection(); ?>

<?php $this->section("content"); ?>

<section class="row">
    <div class="col-12 card">
        <div class="card-header">
            <!-- Botón para crear un nuevo producto -->
            <a href="<?= base_url('/productos/create'); ?>" class="btn btn-success btn-sm">
                <i class="bi bi-plus"></i> Nuevo Producto
            </a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th style="width: 150px">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productos as $producto): ?>
                        <tr class="align-middle">
                            <td><?= $producto["id"]; ?></td>
                            <td><?= $producto["Nombre"]; ?></td>
                            <td><?= $producto["Descripcion"]; ?></td>
                            <td><?= $producto["Precio"]; ?></td>
                            <td>
                                <!-- Botón para editar el producto -->
                                <a href="<?= base_url("/productos/{$producto['id']}/edit"); ?>" class="btn btn-primary btn-sm">
                                    <i class="bi bi-pencil-square"></i> Editar
                                </a>

                                <!-- Botón para ver detalles del producto -->
                                <a href="<?= base_url("/productos/{$producto['id']}"); ?>" class="btn btn-warning btn-sm">
                                    <i class="bi bi-eye"></i> Ver
                                </a>

                                <!-- Botón para eliminar el producto con confirmación -->
                                <button onClick="eliminar(<?= $producto['id']; ?>)" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash3"></i> Eliminar
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Librería SweetAlert para confirmación de eliminación -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function eliminar(id) {
        Swal.fire({
            title: "¿Estás seguro?",
            text: "¡El producto será eliminado permanentemente!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, eliminarlo para siempre!"
        }).then((result) => {
            if (result.isConfirmed) {
                location.href = "<?= base_url(); ?>/productos/" + id + "/delete";
            }
        });
    }
</script>

<?php $this->endSection(); ?>

