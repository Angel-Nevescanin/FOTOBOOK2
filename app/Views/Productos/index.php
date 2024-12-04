<!-- views/productos/index -->

<?php $this->extend("plantilla"); // Plantilla que usaremos ?>

<?php $this->section("titulo"); ?> 
Productos
<?php $this->endSection(); ?>

<?php $this->section("content"); // Aquí empieza el contenido ?>

<section class="row">
    <div class="col-12 card">
        <div class="card-header">
            <a href="<?= base_url(); ?>/productos/create" class="btn btn-success btn-sm"><i class="bi bi-plus"></i> Nuevo Producto</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Imagen</th>
                        <th style="width: 40px">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productos as $producto): // Inicio foreach ?>
                        <tr class="align-middle">
                            <td><?= $producto["id"]; ?></td>
                            <td><?= $producto["Nombre"]; ?></td>
                            <td><?= $producto["Descripcion"]; ?></td>
                            <td><?= number_format($producto["Precio"], 2); ?> USD</td>
                            <td>
                                <?php if ($producto["Imagen"]): ?>
                                    <img src="<?= base_url('uploads/' . $producto["Imagen"]); ?>" alt="Imagen del producto" class="img-thumbnail" width="100">
                                <?php else: ?>
                                    <span class="text-muted">Sin imagen</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?= base_url("/productos/$producto[id]/edit"); ?>" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
                                <a href="<?= base_url("/productos/$producto[id]"); ?>" class="btn btn-warning btn-sm">Ver</a>
                                <button 
                                    onClick="eliminar(<?= $producto["id"]; ?>)"
                                    class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; // Fin foreach ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Librería de SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function eliminar(id) {
        Swal.fire({
            title: "¿Estás seguro?",
            text: "¡El registro se eliminará permanentemente!",
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

<?php $this->endSection("content"); // Aquí termina el contenido ?>
