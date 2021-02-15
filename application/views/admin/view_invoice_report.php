<?php  $this->load->view('index/header');
 
 ?>
 
 
  <div class="container">
      <?php if (!empty($invoice_report)){ ?>
      <div class="row">
          <div class="col-4">
              <a href="<?php echo base_url();?>"><img src="<?php echo base_url()."assets/img/hajihardwarestore.png";?>"  class="img-fluid print_logo" width="100"></a>
        
          </div>
          <div class="col-4 text-center"><h2 class="padding-top_10">Invoice 's Report</h2></div>
          <div class="col-4"></div>
      </div>

    <?php } else{  ?>
     <br>
      <br>
     <?= anchor('admin/welcome','Back',['class' => 'btn btn-lg btn-info'])?>
     <br><br><br><br><br>
        <h1 class="text-center">NO Invoice ,s  Ledger</h1>
    </div>
        <?php die();  }  ?>  
    
  </div>
 <br>
 <div class="container-fluid">
<table class="table table-responsive">
  <thead>
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Invoice #</th>
      <th scope="col">Amount</th> 
    </tr>
  </thead>
  <tbody>
         <?php  $total_balance =0;  
          foreach ($invoice_report as $invoice){
                   
                   $main_invoice_date = $invoice->main_invoice_date;
                   $main_invoice_id   = $invoice->main_invoice_id;
                   $main_i_debit   = $invoice->main_i_debit; 
                   $total_balance += $main_i_debit; 
?>
    <tr>
      <td><?php $main_invoice_date=date_create($main_invoice_date); echo date_format($main_invoice_date,"d-M-Y") ?></td>
      <td><?php echo  $main_invoice_id; ?></td>
      <td><?php echo number_format($main_i_debit); ?></td>
    </tr>
  
  <?php
    } 
  ?>
   <tr> 
      <td></td>
      <td><b>Net Total</b></td>
      <td><?php echo number_format($total_balance);?></td>
  </tr>
  </tbody> 
  
</table>
</div>
<div class="footer">Developed By <b>Hafiz Ahmad (Software Engineer) +923217961092</b></div>
<?php $this->load->view('index/footer'); ?>