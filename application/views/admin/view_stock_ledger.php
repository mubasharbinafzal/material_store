<?php  $this->load->view('index/header'); 
 ?>
     <?php 
             $total_balance_farword =0 ;
                
            foreach ($ledger_stock_balance_forword as $data)
             {

                $s_l_credit = $data->s_l_credit;
                $s_l_debit = $data->s_l_debit;
                $s_l_date = $data->s_l_date;
                if ($s_l_debit != 0 ){
                    $total_balance_farword += $s_l_debit;
                }else{
                   $total_balance_farword -= $s_l_credit;
              }
            }
?>
  
   <?php foreach ($ledger_stock as $data)
    {
       
          $s_l_description = $data->s_l_description;
          $s_l_debit = $data->s_l_debit;
          $s_l_credit = $data->s_l_credit;
          $s_l_date = $data->s_l_date;
          $gatepass = $data->gatepass; 


    }
  ?>
  <div class="container">
      <?php if (!empty($ledger_stock)){ ?>
      <div class="row">
          <div class="col-4">
              <a href="<?php echo base_url();?>"><img src="<?php echo base_url()."assets/img/hajihardwarestore.png";?>"  class="img-fluid print_logo" width="100"></a>
        
          </div>
          <div class="col-4 text-center"><h2 class="padding-top_10">Stock 's Ledger</h2></div>
          <div class="col-4"></div>
      </div>

    <?php } else{  ?>
     <br>
      <br>
     <?= anchor('admin/welcome','Back',['class' => 'btn btn-lg btn-info'])?>
     <br><br><br><br><br>
        <h1 class="text-center">NO stock 's Ledger</h1>
    </div>
        <?php die();  }  ?>  
     <div class="row padding-top_20">
      <div class="col-sm-6">
                   <table class="stock_left">
                       <tr>
                          <td><h5>Selected Ledger</h5></td>
                          <?php $to_date=date_create($stock_date['to_date']); 
                                 $from_date=date_create($stock_date['from_date']); 
                               ?>
                          <td> <h6><?php  echo "<b>From</b> ".date_format($to_date,"d-M-Y")." <b>to</b> ". date_format($from_date,"d-M-Y");;?></h6></td>
                      </tr>
                    </table>
   
      </div>
      <div class="col-sm-6">
          
          <table class="stock_right">
                  <tr>
                  
                  <td><h5>Date And Time</h5></td>
                  <td><h6><?php date_default_timezone_set("Asia/Karachi");
                                echo   date('d-M-Y h:i:s a');  ?> </h6></td>
                </tr>
                 <tr>
                  
                  <td><h5>BF</h5></td>
                  <td><h6><?php  
                   if(gmp_sign($total_balance_farword)==1){
                    
                    echo number_format($total_balance_farword)." DR";
                    
                    }else{
                            $remove_neg=abs($total_balance_farword);
                        echo number_format($remove_neg)." CR";
                    
                    }
                    ?> </h6></td>
                </tr>
               
            
          </table>
    
      </div>
  </div>
  </div>
 <br>
 <div class="container-fluid">
<table class="table table-responsive">
  <thead>
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Description</th>
      <th scope="col">Debit</th>
      <th scope="col">Credit</th>
      <th scope="col">Balance</th>
    </tr>
  </thead>
  <tbody>
         <?php 
          
                $total_balance=0; 
                 $total_balance=0;
                $total_balance = $total_balance+$total_balance_farword;
         foreach ($ledger_stock as $data)
             {
              
              $s_l_description = $data->s_l_description;
              $s_l_debit = $data->s_l_debit;
              $s_l_credit = $data->s_l_credit;
              $s_l_date = $data->s_l_date;
              $gatepass = $data->gatepass; 
              if ($s_l_debit != 0 ){
                    $total_balance += $s_l_debit;
              }else{
                   $total_balance -= $s_l_credit;
              }
              
?>
    <tr>
      <td><?php $s_l_date=date_create($s_l_date); echo date_format($s_l_date,"d-M-Y") ?></td>
      <td><?php if (!empty($gatepass) AND $s_l_debit == 0){
                    echo "Gatepass # ".$gatepass  ;
                }else{
                    echo $s_l_description;
                }
                        
                        ?></td>
      <td><?php if ($s_l_debit != 0){
                     echo number_format($s_l_debit);
                  }else{
                      echo "";
                  }
            ?>
        </td>
        <td><?php if ($s_l_credit != 0){
                     echo number_format($s_l_credit);
                  }else{
                      echo "";
                  }
            ?>
        </td>
      <td><?php  if(gmp_sign($total_balance)==1){
                    
                    echo number_format($total_balance)." DR";
                    
                    }else{
                            $remove_neg=abs($total_balance);
                        echo number_format($remove_neg)." CR";
                    
                    }?>
        </td>
  </tr>
  
  <?php
    }
  ?>
   <tr>
      <td></td>
      <td></td>
      <td></td>
      <td><b>Net Total</b></td>
      <td><?php 
       if(gmp_sign($total_balance)==1){
                    
                    echo "<b>".number_format($total_balance)." DR"."</b>";
                    
                    }else{
                            $remove_neg=abs($total_balance);
                        echo "<b>".number_format($remove_neg)." CR"."</b>";
                    
                    }
      
      ?></td>
  </tr>
  </tbody> 
  
</table>
</div>
<div class="footer">Developed By <b>Hafiz Ahmad (Software Engineer) +923217961092</b></div>
<?php $this->load->view('index/footer'); ?>