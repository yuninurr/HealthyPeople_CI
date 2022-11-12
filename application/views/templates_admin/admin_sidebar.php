<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="<?= base_url('assets/assets_admin/img/logobw.png'); ?>" class="img-fluid-rounded-start" style="width: 45px;"></img>
        </div>
        <div class="sidebar-brand-text mx-1">Healthy People</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0 mb-2">

    <!-- Heading -->
    <div class="sidebar-heading">
        ADMIN
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('dashboard'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('data_vaksin'); ?>">
            <i class="fas fa-fw fa-syringe"></i>
            <span>Data Vaksin</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('chart'); ?>">
            <i class="fas fa-fw fa-bookmark"></i>
            <span>Chart</span></a>
    </li>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline mt-3">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar --