<?php  $this->load->view('index/header');
 
 ?>
  <br> <br >
   <div class="row">
          <div class="col-4">
              <a href="<?php echo base_url();?>"><img src="<?php echo base_url()."assets/img/hajihardwarestore.png";?>"  class="img-fluid print_logo" width="100"></a>
        
          </div>
          <div class="col-4 text-center"><h1 class="padding-top_10">View Entered Stock </h1></div>
          <div class="col-4"></div>
      </div>
      <br> <br >
 <div class="container-fluid">
<table class="table table-responsive">
  <thead>
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Stock</th>
      <th scope="col">Section</th>
      <th scope="col">Gage</th>
      <th scope="col">Color</th>
      
      <th scope="col">Size</th> 
      <th scope="col">Qty</th> 
      <th scope="col">Total</th>  
      <th scope="col">Discount</th> 
      <th scope="col">Rate</th> 
      <th scope="col">Gate pass #</th> 
      <th scope="col" style="text-align: right;">Amount</th> 
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
         <?php 
                $price_total =0; 
                $qty_total =0; 
                $items_number =0; 
                
         foreach ($stock_data as $data)
            {
          $stock_no = $data->stock_no;
          $section = $data->section;
          $thickness = $data->thickness;
          $color = $data->color;
          $qty = $data->qty;
          $total_size = $data->total_size;
          $rate = $data->rate;
          $discount = $data->discount;
          $net_amount = $data->net_amount;
          $remarks = $data->remarks; 
          $date_c   = $data->date;   
          $date_v   = $data->date;   
          $gate_pass_no  = $data->gate_pass_no;   
            $qty_total += $qty;
   
             
            /* discount of percentage*/
                $actual_amount=$total_size*$qty*$rate;
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
      <td><?php echo $total_size;?></td> 
      <td><?php echo $qty ;?></td>
      <td><?php echo $total_size*$qty;?></td> 
      <td><?php echo $discount;?></td> 
      <td><?php echo number_format($rate);?></td>
      <td><?php echo $gate_pass_no;?></td>
      <td style="text-align: right;"><?php echo  number_format($actual_amount);?></td> 
      <td><?php if (empty($gatepass_exist)){  echo  anchor("admin/edit_stock/{$stock_no}",'Edit',['class'=>'btn btn-primary']); } ?></td>
      
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
      <td scope="col">Total Qty</td>
      <td scope="col"><b><?php echo $qty_total;?></b></td> 
      
      <td scope="col"></td>
      <td scope="col"></td>
      <td scope="col"></td>
      <td scope="col" style="text-align: right;">Net Total</td> 
      <td scope="col" style="text-align: right;"><b><?php echo number_format($price_total);?></b></td>
       <td scope="col">
           
               <?php if (empty($gatepass_exist)){  echo form_open_multipart('admin/verify_stock')?>
               <input type="hidden" name="percent_amount" value="<?php echo $price_total;?>">
               <input type="hidden" name="gate_pass_no" value="<?php echo  $gate_pass_no ;?>">
               <input type="hidden" name="date" value="<?php echo  $date_v ;?>">
               <button type="submit" class="btn btn-success">Verified</button>
            	<?php echo form_close();  }?>
           </td>
     
    </tr>
 
  </thead>
</table>
</div>
<div class="footer">Developed By <b>Hafiz Ahmad (Software Engineer) +923217961092</b></div>
<?php $this->load->view('index/footer'); ?>