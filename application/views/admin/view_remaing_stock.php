<?php 
  $this->load->view('index/header');
 ?>
<h1 class="text-center Welcome_msg">View Remaining Stock</h1>
<?php 
  $this->load->view('admin/main_menu');
 ?>
<br>

   <?php foreach ($stock as $data)
    {
          $stock_no = $data->stock_no;
          $section = $data->section;
          $thickness = $data->thickness;
          $color = $data->color;
          $rate = $data->rate;
          $discount = $data->discount;
          $net_amount = $data->net_amount;
          $remarks = $data->remarks;
          $date_c   = $data->date;
          $sizein_ft = $data->sizein_ft;
          $qty = $data->qty;
          $rem_qty = $data->rem_qty;
          $gate_pass_no = $data->gate_pass_no;
          $entered_by = $data->entered_by;
    }
  ?>
 <div class="container">
<table class="table table-responsive" id="stock_table">
  <thead>
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Stock</th>
      <th scope="col">Section</th>
      <th scope="col">Gage</th>
      <th scope="col">Color</th>

      <th scope="col">Size</th>  
      <th scope="col">Qty</th>
      <!-- <th scope="col">Total</th>   -->
      <!-- <th scope="col">Discount</th>  -->
      <th scope="col">Rate</th> 
      <th scope="col">Gate pass #</th> 
      <!-- <th scope="col" style="text-align: right;">Amount</th>  -->
    </tr>
  </thead>
  <tbody>
         <?php
          $price_total =0; 
                $qty_total =0; 
                $items_number =0; 
          foreach ($stock as $data)
            {
          $stock_no = $data->stock_no;
          $section = $data->section;
          $thickness = $data->thickness;
          $color = $data->color;
          $qty = $data->qty;
          $rem_qty = $data->rem_qty;
          $sizein_ft = $data->sizein_ft;
          $rate = $data->rate;
          $discount = $data->discount;
          $net_amount = $data->net_amount;
          $remarks = $data->remarks; 
          $date_c   = $data->date;   
          $date_v   = $data->date;   
          $gate_pass_no  = $data->gate_pass_no;   
            $qty_total += $qty;


           /* discount of percentage*/
                $actual_amount=$sizein_ft*$qty*$rate;
                $percent = $actual_amount*$discount;
                $percent = $percent/100;
                $actual_amount = $actual_amount-$percent;
                 /* discount of percentage*/

                  $price_total+=$actual_amount;

?>
    <tr>
      <td><?php  $date_c=date_create($date_c); echo date_format($date_c,"d-M-Y");?></td>
      <td><?php echo $stock_no;?></td>
      <td><?php echo $section;?></td>
      <td><?php echo $thickness;?></td>
      <td><?php echo $color;?></td>
      <td><?php echo $sizein_ft;?></td> 
      <td><?php echo $rem_qty;?></td>
      
      <!-- <td><?php echo $sizein_ft*$qty;?></td>  -->
      <!-- <td><?php echo $discount;?></td>  -->
      <td><?php echo number_format($rate);?></td>
      <td><?php echo $gate_pass_no;?></td>
      <!-- <td style="text-align: right;"><?php //echo  number_format($actual_amount);?></td>  -->
      
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
      <td scope="col"></td>
      <!-- <td scope="col"></td> -->
      <!-- <td scope="col"></td> -->
      
      <!-- <td scope="col"></td> -->
      <td scope="col"></td>
      <td scope="col"></td>
      <td scope="col" style="text-align: right;">Net Total</td> 
      <td scope="col" style="text-align: right;"><b><?php echo number_format($price_total);?></b></td>
     
    </tr>
 
  </thead>
</table>
</div>
<?php $this->load->view('index/footer'); ?>