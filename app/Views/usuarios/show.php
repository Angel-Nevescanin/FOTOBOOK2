<!-- views/usuario/create -->

<?php $this->extend("plantilla"); //plantilla que usaremos?>

<?php $this->section("titulo");?> 
Nuevo Usuario
<?php $this->endSection();  ?>


<?php $this->section("content"); //aqui empieza el contenido?>

<section class="row">
    <div class="col-12 card">
        <div class="card-header">
            <h3 class="card-litle"><?=$usuario["nombre"]; ?></h3>
        </div>
        <div class="card-body">
        <ul>
            <li> <b>Nombre:</b> <?= $usuario["nombre"]; ?> </li>
            <li> <b>Telefono:</b> <?= $usuario["telefono"]; ?> </li>
            <li> <b>correo:</b> <?= $usuario["correo"]; ?> </li>
        </ul>
    </div>
</div>
</section>

<?php $this->endSection(); //aqui termina el contenido?>
