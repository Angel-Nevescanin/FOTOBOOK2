<!-- views/producto/create -->

<?php $this->extend("plantilla"); //plantilla que usaremos ?>

<?php $this->section("titulo");?> 
Nuevo Producto
<?php $this->endSection();  ?>

<?php $this->section("content"); //aqui empieza el contenido?>

<section class="row">
    <div class="col-12 card">
        <div class="card-header">
            <h3 class="card-litle">Lista de productos</h3>
        </div>
        <div class="card-body">
        <form action="/productos/store" method="POST" name="productoForm" enctype="multipart/form-data">
    <div class="mb-3">
        <label class="form-label" for="Nombre">Nombre</label>
        <input class="form-control" type="text" name="Nombre" required>
    </div>

    <div class="mb-3">
        <label class="form-label" for="Descripcion">Descripcion</label>
        <textarea class="form-control" name="Descripcion" required></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label" for="Precio">Precio</label>
        <input class="form-control" type="number" step="0.01" name="Precio" required>
    </div>

    <div class="mb-3">
        <label class="form-label" for="Imagen">Imagen</label>
        <input class="form-control" type="file" name="Imagen" accept="image/*" required>
    </div>

    <button class="btn btn-success" type="submit">Crear Producto</button>
</form>

        </div>
    </div>
</section>

<?php $this->endSection("content"); //aqui termina el contenido?>
