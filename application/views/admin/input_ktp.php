<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view("_partials/head.php") ?>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php $this->load->view("_partials/sidebar.php") ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php $this->load->view("_partials/topbar.php") ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><a href ="<?php echo base_url(''); ?>">Dashboard</a> / Input Data</h1>
            
            <a href="<?php echo base_url('admin/Inputktp/DataKTP'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-list fa-sm text-white-50"></i> Lihat Data</a>
          </div>

          <div class="card shadow mb-4">
            <div class="card-body">

              <form method="post" id="input_data">

                <div class="form-row">
                  <div class="col-md-6">
                    <div class="form-group form-label-group">
                      <label>NIK</label>
                      <input type="text" id="nik" name="nik" class="form-control" placeholder="NIK" required="required" autofocus="autofocus">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group form-label-group">
                      <label>Nama</label>
                      <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama" required="required" autofocus="autofocus">
                    </div>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-md-4">
                    <div class="form-group form-label-group">
                      <label>Tempat Lahir</label>
                      <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" required="required" autofocus="autofocus">
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group form-label-group">
                      <label>Tanggal Lahir</label>
                      <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" required="required" autofocus="autofocus">
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group form-label-group">
                      <label>Jenis Kelamin</label>
                      <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" autofocus="autofocus">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                    </div>
                  </div>

                </div>

                <div class="form-row">
                  <div class="col-md-6">
                    <div class="form-group form-label-group">
                      <label>Agama</label>
                      <select name="id_agama" id="id_agama" class="form-control" autofocus="autofocus">
                        <?php 
                        echo "<option value=''>Pilih Agama</option>";
                        foreach ($agama as $agamanya) {
                          echo "<option value='".$agamanya->id_agama."'>".$agamanya->agama."</option>";
                        }
                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group form-label-group">
                      <label>Status Perkawinan</label>
                      <select name="id_status_perkawinan" id="id_status_perkawinan" class="form-control" autofocus="autofocus">
                        <?php 
                        echo "<option value=''>Pilih Status</option>";
                        foreach ($status as $statusnya) {
                          echo "<option value='".$statusnya->id_status_perkawinan."'>".$statusnya->status_perkawinan."</option>";
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-md-6">
                    <div class="form-group form-label-group">
                      <label>Pilih Provinsi</label>
                      <select name="id_prov" id="id_prov" class="form-control" autofocus="autofocus">
                        <option selected="">-- Pilih Provinsi --</option>
                        <?php 
                        foreach ($provinsi as $dataprov) {
                          echo "<option value='".$dataprov->id_prov."'>".$dataprov->nama_provinsi."</option>";
                        }
                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group form-label-group">
                      <label>Pilih Kabupaten</label>
                      <select name="id_kab" id="id_kab" class="form-control kabnya" autofocus="autofocus">
                        <option selected="">-- Pilih Kabupaten/Kota --</option>
                      </select>
                      <div class="loadkab"></div>
                    </div>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-md-6">
                    <div class="form-group form-label-group">
                      <label>Pilih Kecamatan</label>
                      <select name="id_kec" id="id_kec" class="form-control kecnya" autofocus="autofocus">
                        <option selected="">-- Pilih Kecamatan --</option>
                      </select>
                      <div class="loadkec"></div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group form-label-group">
                      <label>Pilih Kelurahan</label>
                      <select name="id_kel" id="id_kel" class="form-control kelnya" autofocus="autofocus">
                        <option selected="">-- Pilih Kelurahan --</option>
                      </select>
                      <div class="loadkel"></div>
                    </div>
                  </div>
                </div>


                <div class="form-row">
                  <div class="col-md-12">
                    <div class="form-group form-label-group">
                      <label>Alamat</label>
                      <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat" required="required" autofocus="autofocus">
                    </div>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-md-12">
                    <div class="form-group form-label-group">
                      <label>Pekerjaan</label>
                      <input type="text" id="pekerjaan" name="pekerjaan" class="form-control" placeholder="Pekerjaan" required="required" autofocus="autofocus">
                    </div>
                  </div>
                </div>

                <div class="modal-footer">
                  <input class="btn btn-lg btn-danger btn-block" name="btn-input" id="btn-input" type="submit" value="Simpan Data" autofocus="autofocus">
                  <div class="load"></div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php $this->load->view("_partials/footer.php") ?>
    </div>
  </div>

  <?php $this->load->view("_partials/modal.php") ?>
  <?php $this->load->view("_partials/js.php") ?>
<script type="text/javascript">
  $(document).ready(function(){
        $('#id_prov').change(function(){
            var id_prov=$(this).val();
            $.ajax({
                url : "<?php echo base_url();?>admin/Inputktp/get_Kabupaten",
                method : "POST",
                data : {id_prov: id_prov},
                async : false,
                dataType : 'json',

                beforeSend:function(){
                  $('.loadkab').addClass('loading');
                },

                success: function(data){
                  $('.loadkab').hide();
                    var html = '';
                    var i;

                    html +='<option value="">--Pilih Kabupaten--</option>';

                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].id_kab+'>'+data[i].nama_kab+'</option>';
                    }
                    $('.kabnya').html(html);
                     
                }
            });
        });

        $('#id_kab').change(function(){
            var id_kab=$(this).val();
            $.ajax({
                url : "<?php echo base_url();?>admin/Inputktp/get_Kecamatan",
                method : "POST",
                data : {id_kab: id_kab},
                async : false,
                dataType : 'json',

                beforeSend:function(){
                  $('.loakec').addClass('loading');
                },

                success: function(data){
                  $('.loadkec').hide();
                    var html = '';
                    var i;

                    html +='<option value="">--Pilih Kecamatan--</option>';

                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].id_kec+'>'+data[i].nama_kec+'</option>';
                    }
                    $('.kecnya').html(html);
                     
                }
            });
        });

        $('#id_kec').change(function(){
            var id_kec=$(this).val();
            $.ajax({
                url : "<?php echo base_url();?>admin/Inputktp/get_Kelurahan",
                method : "POST",
                data : {id_kec: id_kec},
                async : false,
                dataType : 'json',

                beforeSend:function(){
                  $('.loakel').addClass('loading');
                },

                success: function(data){
                  $('.loadkel').hide();
                    var html = '';
                    var i;

                    html +='<option value="">--Pilih Kelurahan--</option>';

                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].id_kel+'>'+data[i].nama_kel+'</option>';
                    }
                    $('.kelnya').html(html);
                     
                }
            });
        });



    });
//

</script>
</body>

</html>
