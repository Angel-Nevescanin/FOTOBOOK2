<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> 
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="<?= base_url(); ?>" class="brand-link"> 
            <!--begin::Brand Image-->
            <img src="../../dist/assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image opacity-75 shadow"> 
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">AdminLTE 4</span>
            <!--end::Brand Text--> 
        </a>
        <!--end::Brand Link--> 
    </div>
    <!--end::Sidebar Brand-->

    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <!-- Usuarios -->
                <li class="nav-item">
                    <a href="<?= base_url(); ?>/usuarios" class="nav-link">
                        <i class="nav-icon bi bi-palette"></i>
                        <p>Usuarios</p>
                    </a>
                </li>

                <!-- Productos -->
                <li class="nav-item">
                    <a href="<?= base_url(); ?>/productos" class="nav-link">
                        <i class="nav-icon bi bi-box"></i>
                        <p>Productos</p>
                    </a>
                </li>
            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
