<!DOCTYPE html>
<html lang="en">
<head><?php $profil=$profil->row_array(); $nama_app=$profil['nama_app']; ?> 
<meta charset="utf-8"> 
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
<meta name="description" content=""> 
  <meta name="author" content=""> 
  <title><?php echo $nama_app; ?> </title> 
  <link href="<?php echo base_url('assets/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css"> 
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> 
  <link href="<?php echo base_url('css/sb-admin-2.css') ?>" rel="stylesheet"> 
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('img/logokotamedan.png')?>"/>
</head>
<body class="bg-gradient-primary"> 
<div class="container"> 
<div class="row justify-content-center"> 
<div class="col-xl-6 col-lg-6 col-md-9"> 
<div class="card o-hidden border-0 shadow-lg my-5"> 
<div class="card-body p-0"> 
<div class="row"> 

<div class="col-lg-12"> 
<div class="p-5"> 
<div class="text-center"> 
<h1 class="h5 text-gray-900 mb-4">
  <?php echo "PENDAFTARAN USER <br>APP ".$nama_app; ?>
</h1> 
</div>

<form method="post" id="register" autocomplete="on"> 
	<div class="form-group"> 
		<input type="email" name="username" class="form-control form-control-user" id="text_username" aria-describedby="emailHelp" placeholder="Input Email Anda "> 
		</div>
		<div class="form-group"> 
			<input type="password" name="password" class="form-control form-control-user" id="text_password" placeholder="Input Password Anda"> 
		</div>
		<input class="btn btn-primary btn-user btn-block" name="btn-login" id="btn-login" type="submit" value="DAFTAR" autofocus="autofocus">
    <div class="load"></div>
 </form> 
 <br>
 Sudah Punya akun ? Silahkan 
 <a href="<?php echo base_url('admin'); ?>"> LOGIN</a><hr> 
 
 <div class="row"> 
  <?php echo "<div class='col-sm-12 mb-3 mb-sm-0 text-left small'>" .$nama_app." 29 Desember 2020 - Dev. Edison TP. DOloksaribu, S.SI</div>"; ?>
  </div></div></div></div></div></div></div></div></div>
  
  <script src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script> 
  <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script> 
  <script src="<?php echo base_url('assets/jquery-easing/jquery.easing.min.js') ?>"></script> 
  <script src="<?php echo base_url('js/sb-admin-2.min.js') ?>"></script> 
  <script src="<?php echo base_url('js/sweetalert.min.js') ?>"></script> 



 <script type="text/javascript">

function suksesregister(){
  swal({
    type: 'success',
    title: 'Data berhasil didaftarkan, silahkan login menggunakan Email dan Password yang barusaja anda daftarkan',
    icon :'success',
    showConfirmButton: true,
    timer: 1500
  });
  window.setTimeout(function(){ 
    window.location.replace('../login');
  } ,1500);
}

function gagalregister(){
  swal("GAGAL", "Upss.. gagal disimpan :(", "error");
}

function gagaldatadouble(){
  swal("GAGAL", "Upss.. gagal disimpan karena Email Sudah ada :(", "error");
}

  $(document).ready(function(){
 		$('#register').on('submit',function(e) {
  		$.ajax({
  			url:'<?php echo site_url('Web/PostRegister') ?>',
	        type:'POST',
	        dataType:'json', 
	        data:$(this).serialize(),
	        
	        beforeSend:function(){
	          $('#btn-login').hide();
	          $('.load').addClass('loading');
	        },
        
        success:function(data){
          if(data.status == 'successinput') {
            suksesregister();
            } else if(data.status == 'gagaldouble') {
              gagaldatadouble();
              $('#btn-login').show();
              $('.load').hide();
            } else {
              gagalregister();
              $('#btn-login').show();
              $('.load').hide();
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
</body>
</html>