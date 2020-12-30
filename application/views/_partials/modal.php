  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Anda akan keluar ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Klik tombol "Logout" untuk keluar dari aplikasi.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
          <a class="btn btn-primary" href="<?php echo base_url().'admin/overview/logout' ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

<div class="modal fade" id="show_form_delete_data_ktp" tabindex="-1" role="dialog" aria-labelledby="show_form_delete_data_ktp" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
    <div class="modal-body">
      
      <form method="post" id="hapus_data_ktp">
          <input type="hidden" id="id_data" name="id_data" class="form-control" placeholder="ID" required="required" autofocus="autofocus">
          
          <div class="form-group">
            <div class="form-label-group">
              <label for="Nik">NIK :</label>
              <span class="text-info text-bold" id="nik"></span>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <label for="nama">Nama :</label>
              <span class="text-info text-bold" id="nama"></span>
            </div>
          </div>

          <div class="form-group">
            <span class="text-danger" id="caption_delete"></span>
          </div>

    </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal" aria-label="Close">
            Batal
          </button>
          <input class="btn btn-lg btn-primary btn-block" name="btn-update" id="btn-update" type="submit" value="Hapus Data" autofocus="autofocus">
         <div class="load"></div> 
       </div>
     </form>

   
      </div>
    </div>
  </div>