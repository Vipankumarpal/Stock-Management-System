<!-- dashboard Start -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Stock Management System</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css')?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css')?>">
</head>

<body>
  <nav class="navbar navbar-default" role="navigation">
    <div class="container">
      <!-- product and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?=site_url('dashboard') ?>">SMS</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">
          <li><a href="<?=site_url('dashboard') ?>">Home</a></li>
          
            <li><a href="<?=site_url('vendors') ?>">Vendors</a></li>
            <li><a href="<?=site_url('items') ?>">Items</a></li>
            <li><a href="<?=site_url('purchase') ?>">Purchase</a></li>
            <li><a href="<?=site_url('sale') ?>">Sale</a></li>
            <li><a href="<?=site_url('logout') ?>">Logout</a></li>
         
          
        </ul>
      </div><!-- /.navbar-collapse -->
    </div>
  </nav>
  <?php $this->load->view($template);  ?>
</body>

</html>


