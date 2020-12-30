<?php $profil=$profil->row_array(); ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('images/logo-ico.png') ?>" />

<title><?php echo $profil['nama_app']; ?></title>
<meta name="keywords" content="<?php echo $profil['nama_app']; ?>" />
<meta name="description" content="<?php echo $profil['nama_app']; ?>" />

<script type="application/x-javascript">
  addEventListener("load", function () 
  {
    setTimeout(hideURLbar, 0);
  }, 
  false);
  function hideURLbar() {
    window.scrollTo(0, 1);
  }
</script>
  <link href="<?php echo base_url('css_web_web/popuo-box.css') ?>" rel="stylesheet" type="text/css" media="all" />
  <link rel="stylesheet" href="<?php echo base_url('css_web/jquery.desoslide.css') ?>">

    <!-- css files -->
    <link rel="stylesheet" href="<?php echo base_url('css_web/bootstrap.css') ?>"> <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="<?php echo base_url('css_web/style.css') ?>" type="text/css" media="all" /> <!-- Style-CSS --> 
    <link rel="stylesheet" href="<?php echo base_url('css_web/font-awesome.css') ?>"> 
    <link href="<?php echo base_url('assets/fontawesome-free/css/all.css') ?>" rel="stylesheet" type="text/css"><!-- Font-Awesome-Icons-CSS -->
    <!-- //css files -->


    <link rel="stylesheet" href="<?php echo base_url('css_web/jquery-ui.css') ?>" />
    <!-- web-fonts -->
    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <!-- //web-fonts -->