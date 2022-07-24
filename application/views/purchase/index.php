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
</head> 

<div class="container">
  <div class="row" style="margin-top: 15px;">
    <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10  col-lg-offset-1" style="margin-bottom: -50px; margin-top: 12px;">
      <a  class="btn btn-primary btn-flat" href="<?php echo base_url('add-purchase'); ?>" role="button">Add Purchase</a>
      
    </div>
  </div>
  <h3 class="text-center">All Purchases</h3>

  <div class="row">
    <div class="col-md-offset-1 col-lg-10">
      <table id="manageTable" class="table table-bordered table-hover table-striped">
        <thead>
        <tr>
          <th>Vendor </th>
          <th>Item</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Date/Time</th>
        </tr>
        </thead>
          <?php foreach($purchase as $pur){
             // print_r($pur);
          ?>

        <tbody>
        <tr>
          <td><?= $pur->vendor ?></td>
          <td><?= $pur->item ?></td>
          <td><?= $pur->quantity ?></td>
          <td><?= $pur->price ?></td>
          <td><?= $pur->date_time ?></td> 
          <!-- <td>
            <a class="btn btn-sm btn-warning btn-flat" href="<?php echo base_url('edit-purchase/'.$pur->id) ?>">Edit</a>
            <a onclick="return confirm('Are you sure to delete this?')" class="btn btn-sm btn-danger btn-flat" href="<?php echo base_url('delete-purchase/'.$pur->id) ?>">Delete</a>
          </td> -->
        </tr>
        </tbody>
      <?php } ?>

      </table>
    </div>
  </div>
</div>
</html>