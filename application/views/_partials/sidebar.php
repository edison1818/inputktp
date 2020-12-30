<?php
$profil=$profil->row_array();
//Pengaturan menampilkan Menu pada tingkat level user
if($this->session->userdata('level') == '1') { //Level Kab/Kota  
  $menu_entry_data  = "style='display:none'";
  $menu_laporan     = '';
} else if($this->session->userdata('level') == '2') { 
  $menu_entry_data  = '';
  $menu_laporan     = '';
} else {
  $menu_entry_data  = "style='display:none'";
  $menu_laporan     = "style='display:none'";
}
?>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-light accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-folder"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><?php echo $profil['nama_app'];?></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-1">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url(''); ?>">
          <i class="fas fa-fw fa-home"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Panel menu
      </div>

      
    <span <?php echo $menu_entry_data; ?>>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-folder"></i>
          <span>DATA KTP</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Data</h6>
            <a class="collapse-item" href="<?php echo base_url('admin/Inputktp/InputKTP'); ?>">Input Data</a>
            <a class="collapse-item" href="<?php echo base_url('admin/Inputktp/DataKTP'); ?>">List Data</a>
          </div>
        </div>
      </li>
    </span>


    

    <span <?php echo $menu_laporan; ?>>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTree" aria-expanded="true" aria-controls="collapseTree">
          <i class="fas fa-fw fa-folder"></i>
          <span>LAPORAN</span>
        </a>
        <div id="collapseTree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Laporan Data:</h6>
            <a class="collapse-item" href="<?php echo base_url('admin/Laporan/DataKTP'); ?>">Data KTP</a>

          </div>
        </div>
      </li>
    </span>
    <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>