<?php 
//Ambil User
$this->db->select('*');
$this->db->from('tbl_user');
$this->db->where('id_user',$this->session->userdata('user_id'));
$query_user = $this->db->get();
$user=$query_user->row_array();
$profil=$profil->row_array();
?>
<nav class="navbar navbar-expand navbar-light bg-gradient-primary topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          
          <?php 
          
          echo "<a onclick='goBack()' class='btn btn-info btn-sm text-white-800 m-2'><i class='fa fa-angle-double-left'></i> Back</a> <span class='text-gray-800 m-2'>". $profil['nama_app']."</span> "; ?>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

           <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-list fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                ss
              </div>
            </li>

  

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                <?php echo $user['nama_user']; ?>
  
</span>
                <img class="img-profile rounded-circle" src="<?php echo base_url('img/edisondoloksaribu.jpg'); ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url('logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>