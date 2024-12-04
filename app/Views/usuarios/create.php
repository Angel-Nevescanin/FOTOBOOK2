<!-- views/usuario/create -->

<?php $this->extend("plantilla"); //plantilla que usaremos?>

<?php $this->section("titulo");?> 
Nuevo Usuario
<?php $this->endSection();  ?>


<?php $this->section("content"); //aqui empieza el contenido?>

<section class="row">
    <div class="col-12 card">
        <div class="card-header">
            <h3 class="card-litle">lista de usuarios</h3>
        </div>
        <div class="card-body">
            <form action="/usuarios/store" method="POST" name="usuarioForm" >

                <div class ="mb-3" >
                    <label class="form-label" for="nombre">Nombre</label>
                    <input class="form-control" type="text" name="nombre" required >
                </div>

                <div class ="mb-3" >
                    <label class="form-label" for="telefono">telefono</label>
                    <input class="form-control" type="text" name="telefono" required >
                </div>

                <div class ="mb-3" >
                    <label class="form-label" for="correo">correo</label>
                    <input class="form-control" type="text" name="correo" required >
                </div>

                <div class ="mb-3" >
                    <label class="form-label" for="password">password</label>
                    <input class="form-control" type="text" name="password" required >
                </div>


                <button class="btn btn-success" type="submit"> Crear Usuario</button>
            </form>
        </div>
    </div>
</section>

<?php $this->endSection("content"); //aqui termina el contenido?>
