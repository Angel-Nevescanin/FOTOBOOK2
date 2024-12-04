<!-- views/productos/subplantilla -->

<?php $this->extend("plantilla"); // Plantilla principal que usaremos ?>

<?php $this->section("titulo"); ?> 
Gestión de Productos
<?php $this->endSection(); ?>

<?php $this->section("content"); // Aquí empieza el contenido ?>

<section class="row">
    <div class="col-12 card">
        <div class="card-header">
            <h3 class="card-title">Lista de Productos</h3>
        </div>
        <div class="card-body">
            <p>Aquí va el código para:</p>
            <ul>
                <li>Crear productos</li>
                <li>Editar productos</li>
                <li>Eliminar productos</li>
                <li>Listar productos</li>
            </ul>
        </div>
    </div>
</section>

<?php $this->endSection("content"); // Aquí termina el contenido ?>
