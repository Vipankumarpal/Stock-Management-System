
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Inventory Management - CI</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css')?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css')?>">
  




  <!-- Content Wrapper. Contains page content -->
  <div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
    
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      

        <div class="row">
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-purple">
              <div class="inner">
                <h3><?php echo( $count_data['vendors']); ?></h3>

                <h4><b>Total Vendors</b></h4>

              </div>
              <div class="icon">
                <i class="fa fa-th"></i>
                
              </div>
              <a href="<?php echo base_url('vendors') ?>" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-teal">
              <div class="inner">
                <h3><?php echo $count_data['items']; ?></h3>

                <h4><b>Total Items</b></h4>
              </div>
              <div class="icon">
                <i class="fa fa-cubes"></i>
              </div>
              <a href="<?php echo base_url('items') ?>" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3><?php echo $count_data['purchases']; ?></h3>

                <h4><b>Total Purchase</b></h4>
              </div>
              <div class="icon">
                <i class="fa fa-dollar"></i>
              </div>
              <a href="<?php echo base_url('purchase') ?>" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3><?php echo $count_data['sales']; ?></h3>

                <h4><b>Total Sales</b></h4>
              </div>
              <div class="icon">
                <i class="fa fa-dollar"></i>
              </div>
              <a href="<?php echo base_url('sale') ?>" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

        </div>
        <hr>
        <!-- /.row -->
        <div class="row">
          <h1 class="text-center">Report</h1>
        </div>
          <div class="row">
            <div class="col-md-offset-1 col-lg-10">
              <table id="manageTable" class="table table-bordered table-hover table-striped">
                
                <thead>
                <tr>
                  
                  <th>Item</th>
                  <th>Stock</th>
                  
                </tr>
                </thead>
                

                 <?php foreach($items as $item){
                     // print_r($item);
                    // echo $item->item;
                    // echo $item->stock;
                ?>

                <?php if($item->stock <= 100){ ?>
                  <div class="alert alert-danger" role="alert">
                  <?php echo 'Low ' . ucfirst("$item->item") . ' stock restock it immedietly'; ?>
                  </div>
                  
                <?php } ?>
                  
                <tbody>
                <tr>

 
                  <td><?php echo ucfirst("$item->item"); ?></td>
                  <td><?php echo $item->stock; ?></td>
                </tr>
                
                </tbody>
              <?php } ?>

              

              </table>
            </div>
          </div>
  
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script type="text/javascript">
    $(document).ready(function() {
      $("#dashboardMainMenu").addClass('active');
    }); 
  </script>
