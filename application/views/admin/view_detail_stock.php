<?php 
  $this->load->view('index/header');
 ?>
<h1 class="text-center Welcome_msg">View Detail Stock</h1>
<?php 
  $this->load->view('admin/main_menu');
 ?>
<br>
 
 <div class="container">
<table class="table table-responsive" id="stock_table">
  <thead>
    <tr>
      <th scope="col">stock ID</th>
      <th scope="col">Section</th>
      <th scope="col">Thickness</th>
      <th scope="col">color</th>
        <th scope="col">Size in Ft</th>
        <th scope="col">Qty</th>
      <!--  <th scope="col">Remaining Qty</th>-->
      <!--  <th scope="col">Total Ft</th>-->
      <!--<th scope="col">Rate</th>-->
      <!--<th scope="col">discount</th>-->
      <!--<th scope="col">Net Amount</th>-->
      <!--<th scope="col"></th>-->
    </tr>
  </thead>
  <tbody>
         <?php foreach ($stock_detail as $data)
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
          $stock_detail_qty = $data->stock_detail_qty;
          $stock_detail_size_in_ft = $data->stock_detail_size_in_ft;

?>
    <tr>
      <td><?php echo $stock_no;?></td>
      <td><?php echo $section;?></td>
      <td><?php echo $thickness;?></td>
      <td><?php echo $color;?></td>
      <td><?php echo $stock_detail_size_in_ft;?></td>
      <td><?php echo $stock_detail_qty;?></td>
      <!--<td><?php echo $rem_qty;?></td>-->
      <!--<td><?php echo  $sizein_ft*$qty;?></td>-->
      <!--<td><?php echo $rate;?></td>-->
      <!--<td><?php echo $discount;?></td>-->
      <!--<td><?php echo $net_amount;?></td>-->
      <!--<td><?=  anchor("admin/edit_stock/{$stock_no}",'Edit',['class'=>'btn btn-primary']);  ?></td>-->
  </tr>
  <?php
    }
  ?>
  </tbody>
</table>
</div>
<?php $this->load->view('index/footer'); ?>