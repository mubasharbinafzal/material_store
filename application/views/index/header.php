
<html>
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      
  <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Material Store</title>
    <link href="<?php echo base_url() ?>assets/css/bootstrap.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
   <!--  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" /> -->
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">
  </head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="<?php echo base_url();?>"><img src="<?php echo base_url()."assets/img/hajihardwarestore.png";?>"  class="img-fluid" width="70"></a>
 
  <?php
  		if($this->session->userdata('id')){
       ?>
       <li class="user"><b><?php echo $this->session->userdata('username');?></b></li>
       <li class="login"><a href="<?php echo base_url()?>Logout/index" class="btn btn-danger" >Logout</a></li>
       <ul class="nav-right">
           <li>
          <div class="dropdown">
              <button class="btn btn-primary dropdown-toggle btn-lg" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               stock
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <?= anchor('admin/add_stock','Add',['class' => 'dropdown-item'])?>
                    <?= anchor('admin/entered_stock','view',['class' => 'dropdown-item'])?>
                    <?= anchor('admin/view_remaing_stock','Remaining',['class' => 'dropdown-item'])?>
                    <?= anchor('admin/view_expire_stock','Expire',['class' => 'dropdown-item']) ?>
                    <?= anchor('admin/report_stock','Report',['class' => 'dropdown-item']) ?>
                    <?= anchor('admin/payment_stock','Payment',['class' => 'dropdown-item']) ?>
                    <?= anchor('admin/ledger_stock','Ledger',['class' => 'dropdown-item']) ?>
                    <?= anchor('admin/stock_payment_activity','Activity Log',['class' => 'dropdown-item']) ?>
                     <?= anchor('admin/added_stock','Added Stock',['class' => 'dropdown-item']) ?>
            
              </div>
    </div>
</li>
        <li>
    <div class="dropdown">
          <button class="btn btn-success dropdown-toggle btn-lg" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           Customer 
          </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <?= anchor('admin/add_customer','Add',['class' => 'dropdown-item']) ?> 
        <?= anchor('admin/generate_invoice','Invoice',['class' => 'dropdown-item']) ?>
        <?= anchor('admin/invoice_report','Report',['class' => 'dropdown-item']) ?>
        <?= anchor('admin/payment_customer','Payment',['class' => 'dropdown-item']) ?>
        <?= anchor('admin/generate_ledger','Ledger',['class' => 'dropdown-item']) ?>
        <?= anchor('admin/customer_payment_activity','Activity Log',['class' => 'dropdown-item']) ?>
        <?= anchor('admin/customer_sold_items','Sold items',['class' => 'dropdown-item']) ?>

        </div>
</div>
</li>


<!--  <li>-->
<!--      <?= anchor('admin/welcome','Print Invoice',['class' => 'btn btn-lg btn-info'])?>-->
<!--</li>-->
</ul>
   <?php 
    }else{
   ?>
   <li class="login"><a href="<?php echo base_url()?>auth" class="btn btn-danger">Login</a></li>
     <?php 
    }
   ?>
  
</nav>