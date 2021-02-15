<?php  $this->load->view('index/header');
 
 ?>
 
 
  <div class="container">
      <?php if (!empty($report_stock)){ ?>
      <div class="row">
          <div class="col-4">
              <a href="<?php echo base_url();?>"><img src="<?php echo base_url()."assets/img/hajihardwarestore.png";?>"  class="img-fluid print_logo" width="100"></a>
        
          </div>
          <div class="col-4 text-center"><h2 class="padding-top_10">Stock 's Report</h2></div>
          <div class="col-4"></div>
      </div>

    <?php } else{  ?>
     <br>
      <br>
     <?= anchor('admin/welcome','Back',['class' => 'btn btn-lg btn-info'])?>
     <br><br><br><br><br>
        <h1 class="text-center">NO stock ,s  Ledger</h1>
    </div>
        <?php die();  }  ?>  
    
  </div>
 <br>
 <div class="container-fluid">
<table class="table table-responsive">
  <thead>
    <tr>
      <th scope="col">Date</th>
      <th scope="col">#Gate pass</th>
      <th scope="col">Amount</th> 
    </tr>
  </thead>
  <tbody>
         <?php  $total_lager_balance =0; 
                $actual_amount= 0;
                $gatepass_amount=0;
          foreach ($gatepass_numbers as $gatepass_number){
                    $gatepass =$gatepass_number->gatepass; 
                    $s_l_date =$gatepass_number->s_l_date; 

                    $gatepass_amount =0;
                    $actual_amount = 0;
                    foreach ($report_stock as $report){
                                $ledger_g = $report->gate_pass_no;
                                $stock_no = $report->stock_no;
                                $section = $report->section;
                                $thickness = $report->thickness;
                                $color = $report->color;
                                $rate = $report->rate;
                                $discount = $report->discount;
                                $net_amount = $report->net_amount;
                                $qty = $report->qty;
                                $date_c   = $report->date;
                                $sizein_ft = $report->sizein_ft;
                                $qty = $report->qty;
                                $entered_by = $report->entered_by;
                                $total_size = $report->total_size;
                                $rate = $report->rate;
                                
                                
                                if ($gatepass == $ledger_g){
                                     /* discount of percentage*/
                                        $actual_amount=$total_size*$qty*$rate;
                                        $percent = $actual_amount*$discount;
                                        $percent = $percent/100;
                                        $actual_amount = $actual_amount-$percent;
                                         /* discount of percentage*/
                                         $gatepass_amount += $actual_amount; 
                                    }
                                
                       }
                 
                               $total_lager_balance += $gatepass_amount; 
?>
<?php if($gatepass != "") {?>
    <tr>
      <td><?php $s_l_date=date_create($s_l_date); echo date_format($s_l_date,"d-M-Y") ?></td>
      <td><?php echo $gatepass; ?></td>
      <td><?php echo number_format($gatepass_amount); ?></td>
    </tr>
    <?php   }   ?>
  <?php   }   ?>
   <tr> 
      <td></td>
      <td><b>Net Total</b></td>
      <td><?php echo number_format($total_lager_balance);?></td>
  </tr>
  </tbody> 
  
</table>
</div>
<div class="footer">Developed By <b>Hafiz Ahmad (Software Engineer) +923217961092</b></div>
<?php $this->load->view('index/footer'); ?>