<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('titulo'); ?></title>
    <!-- Incluye estilos adicionales -->
    <?= $this->include("componentes/head"); ?>
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= base_url(); ?>">Mi Aplicación</a>
            <div class="d-flex">
                <?php if (session()->get('is_logged_in')): ?>
                    <span class="navbar-text">
                        Bienvenido, <strong><?= session()->get('nombre'); ?></strong>
                    </span>
                    <a href="<?= base_url(); ?>/logout" class="btn btn-danger btn-sm ms-3">Cerrar sesión</a>
                <?php else: ?>
                    <a href="<?= base_url(); ?>/login" class="btn btn-primary btn-sm">Iniciar sesión</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <!-- Wrapper de la aplicación -->
    <div class="app-wrapper">
        <!-- Header -->
        <?= $this->include("componentes/header"); ?>

        <!-- Sidebar -->
        <?= $this->include("componentes/aside"); ?>

        <!-- Contenido principal -->
        <main class="app-main">
            <div class="app-content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0"><?= $this->renderSection('titulo'); ?></h3>
                        </div>
                        <div class="col-sm-6">
                            <!-- Opcional: Espacio para elementos adicionales en el encabezado -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="app-content">
                <div class="container-fluid">
                    <?= $this->renderSection('content'); ?>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <?= $this->include("componentes/footer"); ?>
    </div>
</body>
</html>
