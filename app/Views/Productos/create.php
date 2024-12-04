<!-- views/producto/create -->

<?php $this->extend("plantilla"); //plantilla que usaremos ?>

<?php $this->section("titulo");?> 
Nuevo Producto
<?php $this->endSection();  ?>

<?php $this->section("content"); //aqui empieza el contenido?>

<section class="row">
    <div class="col-12 card">
        <div class="card-header">
            <h3 class="card-little">Lista de productos</h3>
        </div>
        <div class="card-body">
            <form action=/productos/store method="POST" name="productoForm" >

                <div class="mb-3">
                    <label class="form-label" for="nombre">Nombre</label>
                    <input class="form-control" type="text" name="nombre" required>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="descripcion">Descripcion</label>
                    <textarea class="form-control" name="descripcion" required></textarea>
                </div>
                 
                <div class="mb-3">
                    <label class="form-label" for="nombre">Precio</label>
                    <input class="form-control" type="number" step="0.01" name="precio" required>
                </div>
                 
                 <div class="mb-3">
                     <label class="form-label" for="nombre">Imagen</label>
                     <input class="form-control" type="file" name="imagen" required>
                 </div>
                 
                 <div class="mb-3">
                     <label class="form-label" for="nombre"></label>
                     <input class="form-control" type="hidden" name="producto_id" value="1">
                 </div>

                <button class="btn btn-success" type="submit"> Crear Producto </button>
            </form>
        </div>
    </div>
</section>

<?php $this->endSection("content"); //aqui termina el contenido ?>