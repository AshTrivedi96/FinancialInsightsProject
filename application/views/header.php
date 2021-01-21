<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $title; ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  
  <link href="<?php echo base_url();?>stock_assets/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url();?>stock_assets/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>stock_assets/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>stock_assets/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>stock_assets/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>stock_assets/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?php echo base_url();?>stock_assets/assets/vendor/line-awesome/css/line-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>stock_assets/assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="<?php echo base_url();?>stock_assets/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>stock_assets/assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url();?>stock_assets/assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
  <!-- =======================================================
  * Template Name: Selecao - v2.3.0
  * Template URL: https://bootstrapmade.com/selecao-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <style type="text/css">
    
    #send_email
    {
          background: #fc8129;
          border: 0;
    padding: 10px 24px;
    color: #fff;
    transition: 0.4s;
    border-radius: 50px;

    } #logout
    {
          background: #fc8129;
          border: 0;
    padding: 10px 24px;
    color: #fff;
    transition: 0.4s;
    border-radius: 50px;

    }
 #login
    {
          background: #fc8129;
          border: 0;
    padding: 10px 24px;
    color: #fff;
    transition: 0.4s;
    border-radius: 50px;

    }

    #save_admin_stock
    {
          background: #fc8129;
          border: 0;
    padding: 10px 24px;
    color: #fff;
    transition: 0.4s;
    border-radius: 50px;

    }

  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        <a href="<?php echo base_url(); ?>index.php/stock_home"><img src="<?php echo base_url();?>stock_assets/assets/logo.png" ></a>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li <?php if($title == 'Home') {?>class="active" <?php } ?>><a  href="<?php echo base_url(); ?>index.php/stock_home">Home</a></li>
          <li <?php if($title == 'Live Stock') {?>class="active" <?php } ?>><a  href="<?php echo base_url(); ?>index.php/live_stock">Live Stock</a></li>
          <li <?php if($title == 'Financial Data') {?>class="active" <?php } ?>><a  href="<?php echo base_url(); ?>index.php/financial_data">Financial Data</a></li>
          <li <?php if($title == 'Top Stock') {?>class="active" <?php } ?>><a  href="<?php echo base_url(); ?>index.php/top_stock">Top Stock</a></li>
          <li <?php if($title == 'Contact') {?>class="active" <?php } ?>><a  href="<?php echo base_url(); ?>index.php/stock_contact">Contact</a></li>
         <?php if(!empty($this->session->userdata('stock_username'))): ?>
          <li ><a  href="<?php echo base_url(); ?>index.php/admin_stock/logout">Log Out</a></li>
            
            <?php endif; ?>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->
