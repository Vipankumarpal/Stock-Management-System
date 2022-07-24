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
      <h3 class="text-center ">Add Item</h3>
      

      <?php echo form_open() ?>     
        <div class="col-lg-6 col-sm-6 col-md-6  col-md-offset-3">
          <!-- Form validation Error  -->
            <?php
              if( $err = validation_errors() ){
                ?>
                <div class="alert alert-danger" role="alert">
                  <?php echo $err; ?>
                </div>
                <?php 
              }
            ?>

            <!-- Success Message -->
            <?php
              if( $msg = $this->session->flashdata('msg') ){
                ?>
                <div class="alert alert-success" role="alert">
                  <?php echo $msg; ?>
                </div>
                <?php 
              }
            ?>
            
          <div class="form-group">
            <label for="name">Item</label>
            <input type="text" class="form-control" name="item" placeholder="Item Name">
          </div>
          
          <button type="submit" class="btn btn-primary btn-flat">Add Item</button>
        </div>
      <?php echo form_close() ?>
      </div>
</html>
