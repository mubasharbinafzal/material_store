<?php  $this->load->view('index/header');
 
 ?>

   <?php foreach ($invoices as $data)
    {
        //   $stock_no = $data->stock_no;
        //   $section = $data->section;
        //   $thickness = $data->thickness;
        //   $color = $data->color;
        //   $rate = $data->rate;
        //   $discount = $data->discount;
        //   $net_amount = $data->net_amount;
            $remarks = $data->remarks;
         // $delivered_by = $data->delivered_by;
        //   $date_c   = $data->date;
        //   $sizein_ft = $data->sizein_ft;
        //   $qty = $data->qty;
        //   $gate_pass_no = $data->gate_pass_no;
        //   $entered_by = $data->entered_by;
          $customer_id = $data->customer_id;
          $customer_name = $data->customer_name;
          $customer_city = $data->customer_city;
        //   $invoice_qty = $data->invoice_qty;
        //   $invoice_price = $data->invoice_price;
          $main_invoice_id = $data->main_invoice_id;
          $main_invoice_date = $data->main_invoice_date;
          $main_invoice_name = $data->main_invoice_name;


    }
  ?>
  <div class="container">
      <?php if (!empty($invoices)){ ?>
      <div class="row">
          <div class="col-4">
              <a href="<?php echo base_url();?>"><img src="<?php echo base_url()."assets/img/hajihardwarestore.png";?>"  class="img-fluid print_logo" width="100"></a>
        
          </div>
          <div class="col-4 text-center"><h1 class="padding-top_10">Customer Invoice</h1></div>
          <div class="col-4"></div>
      </div>

    <?php } else{  ?>
     <br>
      <br>
     <?= anchor('admin/welcome','Back',['class' => 'btn btn-lg btn-info'])?>
     <br><br><br><br><br>
        <h1 class="text-center">NO Customer Invoice Report Please Add stock of this Customer </h1>
    </div>
        <?php die();  }  ?>  
    

  
  <div class="row padding-top_20">
      <div class="col-sm-6">
                   <table class="stock_left">
                      <tr>
                          <td><h5>Customer ID</h5></td>
                          <td> <h6><?=  $customer_id ;?></h6></td>
                      </tr>
                      <tr>
                          <td><h5>Customer</h5></td>
                          <td><h6><b><?= $customer_name;?></b></h6></td>
                      </tr>
                      
                            <tr>
                          <td><h5>City</h5></td>
                          <td><h6><?= $customer_city; ?></h6></td>
                      </tr>       
                      <tr>
                          <td><h5>Remarks</h5></td>
                          <td><h6><?=  $remarks;?></h6></td>
                      </tr>
                      <!--<tr>-->
                      <!--    <td><h5>Delivered By</h5></td>-->
                         <!-- <td><h6><? //=  $delivered_by;?></h6></td> -->
                      <!--</tr>-->
          </table>
   
      </div>
      <div class="col-sm-6">
          
          <table class="stock_right">
                  <tr>
                  
                  <td><h5>Invoice</h5></td>
                  <td><h6><?=  $main_invoice_id; ?></h6></td>
              </tr>
              <tr>
                  <td><h5>Date</h5></td>
                  <td><h6><?php $date=date_create($main_invoice_date); 
                  echo date_format($date,"d-M-Y");?></h6></td>
              </tr>
              <!--<tr>-->
              <!--    <td><h5>stock No</h5></td>-->
              <!--    <td>  <h6><? //=  $stock_no; ;?></h6></td>-->
              <!--</tr>-->
              
                  <!--  <tr>-->
                  <!--<td> <h5>Gate Pass No</h5></td>-->
                  <!--<td><h6><?=  $gate_pass_no; ?></h6></td>-->
                  <!--</tr>       -->
                  <tr>
                  <td><h5>Entered By</h5></td>
                   <td><h6><?=  $main_invoice_name;?></h6></td> 
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
      <th scope="col">Sr. #</th>
      <th scope="col">Section</th>
      <th scope="col">Gage</th>
      <th scope="col">Color</th>
      <th scope="col">Size</th>
      <th scope="col">Qty</th> 
      <th scope="col">Total Ft</th> 
      <th scope="col">Rate</th> 
      <th scope="col" style="text-align: right;">Amount</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
         <?php 
                $invoice_price_total =0; 
                $invoice_qty_total =0; 
                $items_number =0; 
                
         foreach ($invoices as $data)
    {
          $stock_no = $data->stock_no;
          $section = $data->section;
          $thickness = $data->thickness;
          $color = $data->color;
          $rate = $data->rate;
          $discount = $data->discount;
          $net_amount = $data->net_amount;
          $remarks = $data->remarks;
          //$delivered_by = $data->delivered_by;
          $date_c   = $data->date;
          $sizein_ft = $data->sizein_ft;
          $qty = $data->qty;
          $ft_invoice = $data->ft_invoice;
          $gate_pass_no = $data->gate_pass_no;
          $entered_by = $data->entered_by;
          $customer_id = $data->customer_id;
          $customer_name = $data->customer_name;
          $customer_city = $data->customer_city;
          $invoice_qty = $data->invoice_qty;
          $invoice_price = $data->invoice_price;
          $main_i_credit = $data->main_i_credit;
          $main_i_debit = $data->main_i_debit;
            $invoice_qty_total+=$invoice_qty;  
             $items_number++;

?>
    <tr>
      <td><?php echo $items_number;?></td>
      <td><?php echo $section;?></td>
      <td><?php echo $thickness;?></td>
      <td><?php echo $color;?></td>
      <td><?php echo $ft_invoice;?></td>
      <td><?php echo $invoice_qty;?></td>
      <td><?php echo  $ft_invoice*$invoice_qty; //Total Ft ?></td>
      <td><?php echo  $rate;?></td> 
      <td style="text-align: right;"><?php echo  number_format($invoice_price);?></td>
      <td></td>
  </tr>
  
  <?php
    }
  ?>
  </tbody>
  <thead>
    <tr>
      <td scope="col"></td>
      <td scope="col"></td>
      <td scope="col"></td>
      <td scope="col"></td>
      <td scope="col">Total Qty</td>
      <td scope="col"><b><?php echo $invoice_qty_total;?></b></td>
      <td scope="col"></td>
      
      <td scope="col" style="text-align: right;">Net Total</td> 
      <td scope="col" style="text-align: right;"><b><?php echo number_format($main_i_debit);?></b></td>
       <td scope="col"></td>
     
    </tr>
 
  </thead>
</table>
</div>
<div class="footer">Developed By <b>Hafiz Ahmad (Software Engineer) +923217961092</b></div>
<?php $this->load->view('index/footer'); ?>