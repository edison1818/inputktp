<script src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.js') ?>"></script>
<script src="<?php echo base_url('assets/jquery-easing/jquery.easing.min.js') ?>"></script>
<script src="<?php echo base_url('js/sb-admin-2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/chart.js/Chart.min.js') ?>"></script>
<script src="<?php echo base_url('js/demo/chart-area-demo.js') ?>"></script>
<script src="<?php echo base_url('js/demo/chart-pie-demo.js') ?>"></script>
<script src="<?php echo base_url('js/sweetalert.min.js') ?>"></script>
<script src="<?php echo base_url('assets/ckeditor/ckeditor.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap4.min.js') ?>"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url('js/demo/datatables-demo.js') ?>"></script>

  <!-- TOMBIL Export datatables -->
    <script src="<?php echo base_url('assets/datatables/dataTables.buttons.min.js') ?>"></script>
    
    <script src="<?php echo base_url('assets/datatables/buttons.html5.min.js') ?>"></script>

    
    <script src="<?php echo base_url('assets/datatables/jszip.min.js') ?>"></script>  

    <script src="<?php echo base_url('assets/datatables/pdfmake.min.js') ?>"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>


      
<!--  -->
<script type="text/javascript">

function refreshPage(){
    window.location.reload();
} 
//Fungsi menampilkan status
function suksesinput(){
  swal({
    type: 'success',
    title: 'Data berhasil disimpan',
    icon :'success',
    showConfirmButton: true,
    timer: 1500
  });
  window.setTimeout(function(){ 
    window.location.replace('');
  } ,1500);
}

function gagaldisimpan(){
  swal("GAGAL", "Upss.. gagal disimpan :(", "error");
}

function gagaldatadouble(){
  swal("GAGAL", "Upss.. gagal disimpan karena Nik Sudah ada :(", "error");
}

function suksesupdate(){
  swal({
    type: 'success',
    title: 'Data berhasil diUpdate',
    icon :'success',
    showConfirmButton: true,
    timer: 1500
  });
  window.setTimeout(function(){ 
    window.location.replace('');
  } ,1500);
}

function gagalupdate(){
  swal("GAGAL", "Upss.. gagal disimpan :(", "error");
}

function suksesdelete(){
  swal({
    type: 'success',
    title: 'Data berhasil diHapus',
    icon :'success',
    showConfirmButton: true,
    timer: 1500
  });
  window.setTimeout(function(){ 
    table.ajax.reload( null, false );
    $("#show_form_delete_data_ktp").modal("hide");
  } ,1500);
}


//Konfirmasi action
$(document).ready(function() {
  $('#konfirmasi_hapus, #konfirmasi_hapus_lokasi, #konfirmasi_hapus_file, #konfirmasi_update, #konfirmasi_reset_password').on('show.bs.modal', 
    function(e) {
      $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
});
//

//EDIT 

var id_detail;
function btndeletedataktp(id_data) {

  id_detail=id_data; //panggil var nya
  $.ajax({
    url : '<?php echo site_url('') ?>admin/Inputktp/get_data_ktp',
    data : {id_data:id_detail},
    method:'GET',
    dataType : 'json',
    beforeSend:function(){
      // $('.load').addClass('loading');
    },
    success : function(response){
      $('#id_data').val(response['id_data']);
      $('#nik').html(response['nik']);
      $('#nama').html(response['nama']);
      $('#caption_delete').html('Data akan dihapus permanen, Proses ini tidak dapat dibatalkan, Anda yakin ?');
      $('#show_form_delete_data_ktp').modal();
    }
  });
} 
//

$(document).ready(function(){

$('#input_data').on('submit',function(e) {  
  $.ajax({
        url:'<?php echo site_url('admin/Inputktp/PostDataKTP') ?>',
        type:'POST',
        dataType:'json', 
        data:$(this).serialize(),
        
        beforeSend:function(){
          $('#btn-input').hide();
          $('.load').addClass('loading');
        },
        
        success:function(data){
          if(data.status == 'successinput') {
            suksesinput();
            } else if(data.status == 'gagaldouble') {
              gagaldatadouble();
              $('#btn-input').show();
              $('.load').hide();
            } else {
              gagalinput();
              $('#btn-input').show();
              $('.load').hide();
            }
          },
          error:function(data){
            error();
          }
        });
  e.preventDefault(); 
});

$('#update_data_ktp').on('submit',function(e) {  
  $.ajax({
        url:'<?php echo site_url('admin/Inputktp/update_data_ktp') ?>',
        type:'POST',
        dataType:'json', 
        data:$(this).serialize(),
        
        beforeSend:function(){
          $(".load").html("");
        },
        
        success:function(data){
          if(data.status == 'successupdate') {
            suksesupdate();
          } else {
            gagalemaildouble();
          }
        },
        error:function(data){
          error();
        }
      });
  e.preventDefault(); 
});

$('#hapus_data_ktp').on('submit',function(e) {  
  $.ajax({
        url:'<?php echo site_url('admin/Inputktp/delete_data_ktp') ?>',
        type:'POST',
        dataType:'json', 
        data:$(this).serialize(),
        
        beforeSend:function(){
          $('#btn-update').hide();
          $('#close').hide();
          $('.load').addClass('loading');
        },
        
        success:function(data){
          if(data.status == 'successdelete') {
            suksesdelete();
          } else {
            error();
          }
        },

      error:function(data){
        error();
      }
    });
    e.preventDefault(); 
  });


});
   
  

  </script>  



<!-- Button Loading -->

<script type="text/javascript">

  $(function(){
    $(":submit").click(function(){
      $("#btn-input").hide()
      $('#btn-input').hide();
      $('.load').addClass('loading');
        setTimeout(function () { 
      $('.load').removeClass('loading');
      $('#btn-input').show();

    }, 2000);
    });
  });
  
</script>

