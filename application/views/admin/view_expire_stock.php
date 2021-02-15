<?php 
  $this->load->view('index/header');
 ?>
<h1 class="text-center Welcome_msg">Expire Stock</h1>
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
      <th scope="col">stock ID</th>
      <th scope="col">Section</th>
      <th scope="col">Thickness</th>
      <th scope="col">color</th>
        <th scope="col">Total Size</th>
        <th scope="col">Remaining Qty</th>
    
      <th scope="col">Discount</th>
      <th scope="col">Amount</th>
          <th scope="col">Gate Pass No</th> 
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
         <?php foreach ($stock as $data)
    {
          $stock_no = $data->stock_no;
          $section = $data->section;
          $thickness = $data->thickness;
          $color = $data->color;
          $rate = $data->rate;
          $discount = $data->discount;
          $net_amount = $data->net_amount;
            $rem_qty = $data->rem_qty;
          $date_c   = $data->date;
          $sizein_ft = $data->sizein_ft;
          $qty = $data->qty;
          $entered_by = $data->entered_by;
           $gate_pass_no = $data->gate_pass_no;

?>
    <tr>
      <td><?php echo $stock_no;?></td>
      <td><?php echo $section;?></td>
      <td><?php echo $thickness;?></td>
      <td><?php echo $color;?></td>
      <td><?php echo $sizein_ft;?></td>
      <td><?php echo $rem_qty;?></td>
      <td><?php echo $discount;?></td>
      <td><?php echo $net_amount;?></td>
       <td><?php echo $gate_pass_no;?></td>
      <td><?=  anchor("admin/edit_stock/{$stock_no}",'Edit',['class'=>'btn btn-primary']);  ?></td>
  </tr>
  <?php
    }
  ?>
  </tbody>
</table>
</div>
<?php $this->load->view('index/footer'); ?>