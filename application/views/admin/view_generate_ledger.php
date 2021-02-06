<?php  $this->load->view('index/header');
 
 ?>
    <?php 
             $total_balance_farword =0 ;
                
            foreach ($balance_farword as $data)
             {
                $main_i_credit = $data->main_i_credit;
                $main_i_debit = $data->main_i_debit;
                $main_invoice_date = $data->main_invoice_date;
                if ($main_i_debit != 0 ){
                    $total_balance_farword += $main_i_debit;
                }else{
                   $total_balance_farword -= $main_i_credit;
              }
            }
?>
   <?php foreach ($customer_ledger as $data)
    {
       
          $customer_id = $data->customer_id;
          $customer_name = $data->customer_name;
          $customer_city = $data->customer_city;
          $main_invoice_id = $data->main_invoice_id;
          $main_invoice_name = $data->main_invoice_name;
          $main_i_credit = $data->main_i_credit;
          $main_i_debit = $data->main_i_debit;


    }
  ?>
  <div class="container">
      <?php if (!empty($customer_ledger)){ ?>
      <div class="row">
          <div class="col-4">
              <a href="<?php echo base_url();?>"><img src="<?php echo base_url()."assets/img/hajihardwarestore.png";?>"  class="img-fluid print_logo" width="100"></a>
        
          </div>
          <div class="col-4 text-center"><h2 class="padding-top_10">Customer 's Ledger</h2></div>
          <div class="col-4"></div>
      </div>

    <?php } else{  ?>
     <br>
      <br>
     <?= anchor('admin/welcome','Back',['class' => 'btn btn-lg btn-info'])?>
     <br><br><br><br><br>
        <h1 class="text-center">NO Customer 's Invoice Ledger</h1>
    </div>
        <?php die();  }  ?>  
     <div class="row padding-top_20">
      <div class="col-sm-6">
                   <table class="stock_left">
                       <tr>
                          <td><h5>Selected Ledger</h5></td>
                          <?php $to_date=date_create($invoice_date['to_date']); 
                                 $from_date=date_create($invoice_date['from_date']); 
                               ?>
                          <td> <h6><?php  echo "<b>From</b> ".date_format($to_date,"d-M-Y")." <b>to</b> ". date_format($from_date,"d-M-Y");;?></h6></td>
                      </tr>
                      <tr>
                          <td><h5>Customer</h5></td>
                          <td><h6><b><?= $customer_id." ".$customer_name;?></b></h6></td>
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
                   if($total_balance_farword > 0 ){
                    
                    echo number_format($total_balance_farword)." DR";
                    
                    }else{
                            $remove_neg=abs($total_balance_farword);
                        echo number_format($remove_neg)." CR";
                    
                    }
                    ?>
                   </h6>
                   </td>
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
         
                $total_remaining_balance =0;
                $total_balance=0;
                $total_balance = $total_balance+$total_balance_farword;
                
         foreach ($customer_ledger as $data)
             {
              $customer_id = $data->customer_id;
              $customer_name = $data->customer_name;
              $customer_city = $data->customer_city;
              $main_invoice_id = $data->main_invoice_id;
              $main_invoice_name = $data->main_invoice_name;
              $main_invoice_date = $data->main_invoice_date;
              $main_i_description = $data->main_i_description;
              $main_i_credit_debit = $data->main_i_credit_debit;
              $main_i_credit = $data->main_i_credit;
              $main_i_debit = $data->main_i_debit;
              if ($main_i_debit != 0 ){
                    $total_balance += $main_i_debit;
              }else{
                   $total_balance -= $main_i_credit;
              }
              
?>
    <tr>
      <td><?php $main_invoice_date=date_create($main_invoice_date); echo date_format($main_invoice_date,"d-M-Y") ?></td>
      <td><?php if (empty($main_i_description) AND $main_i_credit_debit == 0){
                    echo $customer_name." INV # ".$main_invoice_id ;
                }else{
                    echo $main_i_description;
                }
                        
                        ?></td>
      <td><?php if ($main_i_debit != 0){
                     echo number_format($main_i_debit);
                  }else{
                      echo "";
                  }
            ?>
        </td>
        <td><?php if ($main_i_credit != 0){
                     echo number_format($main_i_credit);
                  }else{
                      echo "";
                  }
            ?>
        </td>
      <td><?php 
       if($total_balance > 0){
                    
                    echo number_format($total_balance)." DR";
                    
                    }else{
                            $remove_neg=abs($total_balance);
                        echo number_format($remove_neg)." CR";
                    
                    }
      
      ?></td>
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
               if($total_balance > 0){
                    
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