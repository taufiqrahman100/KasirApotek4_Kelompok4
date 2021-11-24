<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
      <img src="<?php echo base_url('gambar/logo.png') ?>" style="height: 60px;">
      <!-- <i class="fas fa-building"></i> -->
    </div>
    <div class="sidebar-brand-text mx-3"><?= $title ?> APOTEK K4 </div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="#tabs-1">
      <i class="fas fa-fw fa-book"></i>
      <span>Laporan</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Karyawan
  </div>


  <!-- Nav Item - Utilities Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#tabs-5" aria-expanded="true" aria-controls="collapseUtilities">
      <i class="fas fa-user-plus"></i>
      <span>Tambah Karyawan</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#tabs-2" aria-expanded="true" aria-controls="collapseUtilities">
      <i class="fas fa-wrench"></i>
      <span>Kelola Karyawan</span>
    </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">


  <div class="sidebar-heading">
    Barang
  </div>


  <!-- Nav Item - Utilities Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#tabs-3" aria-expanded="true" aria-controls="collapseUtilities">
      <i class="fas fa-database"></i>
      <span>Kelola Barang</span>
    </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Nav Item - Tables -->
  <li class="nav-item">
    <a href="#tabs-4" class="nav-link collapsed" data-toggle="modal" data-target="#logoutModal">
      <i class="fas fa-sign-out-alt fa-fw"></i>
      <span>Logout</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->